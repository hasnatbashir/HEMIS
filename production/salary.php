<?php
require 'connect.php';
require 'functions.php';

$emp_id = 0;
if (isset($_GET['id']))
    $emp_id = (int)$_GET['id'];

$employee = get_employee($conn, $emp_id);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["salary"]))
    {
        if(is_null($employee["salary"]))
        {
            $stmt = $conn->prepare("INSERT INTO employee_salary (basic_salary, employee_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $_POST["salary"]["basic_salary"], $employee["id"]);
            $stmt->execute();
            $stmt->close();
        } else {
            $stmt = $conn->prepare("UPDATE employee_salary SET basic_salary = ? WHERE employee_id = ?");
            $stmt->bind_param("ii", $_POST["salary"]["basic_salary"], $employee["id"]);
            $stmt->execute();
            $stmt->close();
        }
    } else {
        if(is_null($employee["salary"]))
        {
            $stmt = $conn->prepare("INSERT INTO employee_salary (basic_salary, employee_id) VALUES (0, ?)");
            $stmt->bind_param("i", $employee["id"]);
            $stmt->execute();
            $stmt->close();
            $employee = get_employee($conn, $emp_id);
        }

        if(isset($_POST["allowances"]))
        {
            if(is_null($employee["salary"]['allowances']))
            {
                $stmt = $conn->prepare("INSERT INTO employee_salary_allowances (employee_salary_id, medical, travel, home_rent, special, child_education, servant) 
                                                VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("iiiiiii", $employee["salary"]["id"], $_POST["allowances"]["medical"], $_POST["allowances"]["travel"], $_POST["allowances"]["rent"], $_POST["allowances"]["special"], $_POST["allowances"]["education"], $_POST["allowances"]["servant"]);
                $stmt->execute();
                $stmt->close();
            } else {
                $stmt = $conn->prepare("UPDATE employee_salary_allowances SET medical = ?, travel = ?, home_rent = ?, special = ?, child_education = ?, servant = ? WHERE employee_salary_id = ?");
                $stmt->bind_param("iiiiiii", $_POST["allowances"]["medical"], $_POST["allowances"]["travel"], $_POST["allowances"]["rent"], $_POST["allowances"]["special"], $_POST["allowances"]["education"], $_POST["allowances"]["servant"], $employee["salary"]["id"]);
                $stmt->execute();
                $stmt->close();
            }
            $employee = get_employee($conn, $emp_id);
        } else if(isset($_POST["deductions"]))
        {
            if(is_null($employee["salary"]['deductions']))
            {
                $stmt = $conn->prepare("INSERT INTO employee_salary_deductions (employee_salary_id, professional_tax, income_tax, provident_fund) 
                                                VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiii", $employee["salary"]["id"], $_POST["deductions"]["professional_tax"], $_POST["deductions"]["income_tax"], $_POST["deductions"]["provident_fund"]);
                $stmt->execute();
                $stmt->close();
            } else {
                $stmt = $conn->prepare("UPDATE employee_salary_deductions SET professional_tax = ?, income_tax = ?, provident_fund = ? WHERE employee_salary_id = ?");
                $stmt->bind_param("iiii", $employee["salary"]["id"], $_POST["deductions"]["professional_tax"], $_POST["deductions"]["income_tax"], $_POST["deductions"]["provident_fund"]);
                $stmt->execute();
                $stmt->close();
            }
            $employee = get_employee($conn, $emp_id);
        }
    }

    $employee = get_employee($conn, $emp_id);
}

//echo json_encode($employee);
//die();
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="images/favicon.ico" rel="icon" type="image/ico"/>

    <title>Salary</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a class="site_title" href="index.php"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img alt="..." class="img-circle profile_img" src="images/img.jpg">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-usd"></i> Payroll <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.php">Service</a></li>
                                    <li><a href="loans.php">Loans</a></li>
                                    <li class="nav subside-menu">
                                        <a> Reports <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav side-menu">
                                            <li><a href="editreport.php">Edit Report</a></li>
                                            <li><a href="paymentreport.php">Payment Report</a></li>
                                            <li><a href="arrearreport.php">Arrear Report</a></li>
                                            <li><a href="comparativereport.php">Comparative Report</a></li>
                                            <li><a href="employeesreport.php">Employees Report</a></li>
                                            <li><a href="incometaxreport.php">Income Tax Report</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a aria-expanded="false" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               href="javascript:;">
                                <img alt="" src="images/img.jpg">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="x_panel">
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" method="POST">

                                    <span class="section">Allowances</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_medical">Medical Allowance</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_medical" min="0"
                                                   name="allowances[medical]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['allowances'])) ? 0 : $employee['salary']['allowances']['medical']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_travel">Travel Allowance</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_travel" min="0"
                                                   name="allowances[travel]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['allowances'])) ? 0 : $employee['salary']['allowances']['travel']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_rent">Home Rent Allowance</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_rent" min="0"
                                                   name="allowances[rent]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['allowances'])) ? 0 : $employee['salary']['allowances']['home_rent']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_special">Special Allowance</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_special" min="0"
                                                   name="allowances[special]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['allowances'])) ? 0 : $employee['salary']['allowances']['special']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_child">Child Educ
                                            Allowance
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_child" min="0"
                                                   name="allowances[education]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['allowances'])) ? 0 : $employee['salary']['allowances']['child_education']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input6">Servant
                                            Allowance
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input6" min="0"
                                                   name="allowances[servant]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['allowances'])) ? 0 : $employee['salary']['allowances']['servant']; ?>">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button class="btn btn-success" id="send" type="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="x_panel">
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" method="POST">

                                    <span class="section">Deductions</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_professional_tax">Professional
                                            Tax
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_professional_tax" min="0"
                                                   name="deductions[professional_tax]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['deductions'])) ? 0 : $employee['salary']['deductions']['professional_tax']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input2">Income Tax
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_income_tax" min="0"
                                                   name="deductions[income_tax]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['deductions'])) ? 0 : $employee['salary']['deductions']['income_tax']; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_provident_fund">Provident Fund</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_provident_fund" min="0"
                                                   name="deductions[provident_fund]" type="number" required
                                                   value="<?php echo (is_null($employee['salary']) || is_null($employee['salary']['deductions'])) ? 0 : $employee['salary']['deductions']['provident_fund']; ?>">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button class="btn btn-success" id="send" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" method="POST">

                                    <span class="section">Summary</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_basic_salary">Basic
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_basic_salary" min="0"
                                                   name="salary[basic_salary]" type="number" required
                                                   value="<?php echo (is_null($employee['salary'])) ? 0 : $employee['salary']['basic_salary']; ?>">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_total_allowances">Total
                                            Allowances
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_total_allowances" min="0"
                                                   value="<?php echo $employee['total_allowances']; ?>"
                                                   disabled>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_total_deductions">Total
                                            Deductions
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_total_deductions" min="0"
                                                   type="number" value="<?php echo $employee['total_deductions']; ?>"
                                                   disabled>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input_net_salary">Net Salary
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" id="input_net_salary" min="0"
                                                   type="number"
                                                   value="<?php echo (is_null($employee['salary'])) ? 0 : $employee['salary']['basic_salary'] + $employee['total_allowances'] - $employee['total_deductions']; ?>"
                                                   disabled>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button class="btn btn-success" id="send" type="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
        HEMIS - <a href="index.php">Payroll System</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

</body>

</html>






















