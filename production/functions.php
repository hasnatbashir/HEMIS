<?php

function get_employee($conn, $emp_id)
{
    $stmt = $conn->prepare("SELECT * FROM employee WHERE id = ?");
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    //fetching result would go here, but will be covered later

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        header("HTTP/1.0 404 Not Found");
        die('404: No page found!');
    }

    $employee = $result->fetch_assoc();
    $stmt->close();

    $stmt = $conn->prepare("SELECT * FROM employee_salary WHERE employee_id = " . $employee['id']);
    $stmt->execute();

    $result = $stmt->get_result();
    $salary_check = true;
    if ($result->num_rows === 0)
        $salary_check = false;

    $employee["salary"] = $result->fetch_assoc();
    $stmt->close();

    $employee["total_allowances"] = $employee["total_deductions"] = 0;

    if ($salary_check) {
        $employee["salary"]["allowances"] = null;
        $employee["salary"]["deductions"] = null;
        $stmt = $conn->prepare("SELECT * FROM employee_salary_allowances WHERE employee_salary_id = " . $employee['salary']['id']);
        $stmt->execute();

        $result = $stmt->get_result();
        $employee["salary"]["allowances"] = $result->fetch_assoc();
        $stmt->close();
        if (!is_null($employee["salary"]["allowances"]))
            $employee["total_allowances"] = $employee["salary"]["allowances"]["medical"]
                + $employee["salary"]["allowances"]["travel"]
                + $employee["salary"]["allowances"]["home_rent"]
                + $employee["salary"]["allowances"]["special"]
                + $employee["salary"]["allowances"]["child_education"]
                + $employee["salary"]["allowances"]["servant"];

        $stmt = $conn->prepare("SELECT * FROM employee_salary_deductions WHERE employee_salary_id = " . $employee['salary']['id']);
        $stmt->execute();

        $result = $stmt->get_result();
        $employee["salary"]["deductions"] = $result->fetch_assoc();
        $stmt->close();

        $employee["total_deductions"] = $employee["salary"]["deductions"]["professional_tax"]
            + $employee["salary"]["deductions"]["income_tax"]
            + $employee["salary"]["deductions"]["provident_fund"];

    }

    return $employee;
}


function get_employee_with_payslip($conn, $emp_id, $month, $year)
{
    $stmt = $conn->prepare("SELECT * FROM employee WHERE id = ?");
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    //fetching result would go here, but will be covered later

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        header("HTTP/1.0 404 Not Found");
        die('404: No page found!');
    }

    $employee = $result->fetch_assoc();
    $stmt->close();

    $stmt = $conn->prepare("SELECT * FROM employee_salary WHERE employee_id = " . $employee['id']);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        header("HTTP/1.0 404 Not Found");
        die('404: No page found!');
    }

    $employee["salary"] = null;
    $salary = $result->fetch_assoc();
    $stmt->close();

    $employee["total_allowances"] = $employee["total_deductions"] = 0;

    $salary["status"] = "unpaid";

    $stmt = $conn->prepare("SELECT * FROM employee_salary_payslips WHERE `employee_salary_id` = ? AND `month` = ? AND `year` = ?");
    $stmt->bind_param("iii", $salary['id'], $month, $year);
    $stmt->execute();

    $result = $stmt->get_result();
    $payslip = $result->fetch_assoc();
    $payslip["status"] = "paid";

    if(is_null($payslip) && $month >= (int) date('m') && $year >= (int) date('Y'))
    {
        $employee["salary"] = $salary;

        $employee["salary"]["allowances"] = null;
        $employee["salary"]["deductions"] = null;
        $stmt = $conn->prepare("SELECT * FROM employee_salary_allowances WHERE employee_salary_id = " . $employee['salary']['id']);
        $stmt->execute();

        $result = $stmt->get_result();
        $employee["salary"]["allowances"] = $result->fetch_assoc();
        $stmt->close();
        if (!is_null($employee["salary"]["allowances"]))
            $employee["total_allowances"] = $employee["salary"]["allowances"]["medical"]
                + $employee["salary"]["allowances"]["travel"]
                + $employee["salary"]["allowances"]["home_rent"]
                + $employee["salary"]["allowances"]["special"]
                + $employee["salary"]["allowances"]["child_education"]
                + $employee["salary"]["allowances"]["servant"];

        $stmt = $conn->prepare("SELECT * FROM employee_salary_deductions WHERE employee_salary_id = " . $employee['salary']['id']);
        $stmt->execute();

        $result = $stmt->get_result();
        $employee["salary"]["deductions"] = $result->fetch_assoc();
        $stmt->close();

        $employee["total_deductions"] = $employee["salary"]["deductions"]["professional_tax"]
            + $employee["salary"]["deductions"]["income_tax"]
            + $employee["salary"]["deductions"]["provident_fund"];
    }
    else
    {
        $employee["salary"] = $payslip;

        if(isset($employee['salary']['id']))
        {
            $employee["salary"]["allowances"] = null;
            $employee["salary"]["deductions"] = null;
            $stmt = $conn->prepare("SELECT * FROM employee_salary_payslip_allowances WHERE employee_salary_payslip_id = " . $employee['salary']['id']);
            $stmt->execute();

            $result = $stmt->get_result();
            $employee["salary"]["allowances"] = $result->fetch_assoc();
            $stmt->close();
            if (!is_null($employee["salary"]["allowances"]))
                $employee["total_allowances"] = $employee["salary"]["allowances"]["medical"]
                    + $employee["salary"]["allowances"]["travel"]
                    + $employee["salary"]["allowances"]["home_rent"]
                    + $employee["salary"]["allowances"]["special"]
                    + $employee["salary"]["allowances"]["child_education"]
                    + $employee["salary"]["allowances"]["servant"];

            $stmt = $conn->prepare("SELECT * FROM employee_salary_payslip_deductions WHERE employee_salary_payslip_id = " . $employee['salary']['id']);
            $stmt->execute();

            $result = $stmt->get_result();
            $employee["salary"]["deductions"] = $result->fetch_assoc();
            $stmt->close();

            $employee["total_deductions"] = $employee["salary"]["deductions"]["professional_tax"]
                + $employee["salary"]["deductions"]["income_tax"]
                + $employee["salary"]["deductions"]["provident_fund"];
        } else {
            $employee["salary"] = $salary;
        }
    }

    return $employee;
}
