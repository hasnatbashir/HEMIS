<?php
require 'connect.php';
require 'functions.php';

$emp_id = 0;
$month = (int) date('m');
$year = (int) date('Y');

if (isset($_GET['id']))
    $emp_id = (int)$_GET['id'];
if (isset($_GET['month']))
    $month = (int)$_GET['month'];
if (isset($_GET['year']))
    $year = (int)$_GET['year'];

$employee = get_employee_with_payslip($conn, $emp_id, $month, $year);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo "Generate";
    die();
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
    <link href="images/favicon.ico" rel="icon" type="image/ico" />

    <title>Pay Slip</title>

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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />

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
                            <a aria-expanded="false" class="user-profile dropdown-toggle" data-toggle="dropdown" href="javascript:;">
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
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <form method="GET">
                            <input type="hidden" name="id" value="<?php echo $emp_id; ?>">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <select class="form-control select2" id="month" name="month">
                                    <option></option>
                                    <option value="1"<?php echo (isset($_GET['month']) && $_GET['month'] == 1) ? " selected" : ""; ?>>January</option>
                                    <option value="2"<?php echo (isset($_GET['month']) && $_GET['month'] == 2) ? " selected" : ""; ?>>February</option>
                                    <option value="3"<?php echo (isset($_GET['month']) && $_GET['month'] == 3) ? " selected" : ""; ?>>March</option>
                                    <option value="4"<?php echo (isset($_GET['month']) && $_GET['month'] == 4) ? " selected" : ""; ?>>April</option>
                                    <option value="5"<?php echo (isset($_GET['month']) && $_GET['month'] == 5) ? " selected" : ""; ?>>May</option>
                                    <option value="6"<?php echo (isset($_GET['month']) && $_GET['month'] == 6) ? " selected" : ""; ?>>June</option>
                                    <option value="7"<?php echo (isset($_GET['month']) && $_GET['month'] == 7) ? " selected" : ""; ?>>July</option>
                                    <option value="8"<?php echo (isset($_GET['month']) && $_GET['month'] == 8) ? " selected" : ""; ?>>August</option>
                                    <option value="9<?php echo (isset($_GET['month']) && $_GET['month'] == 9) ? " selected" : ""; ?>">September</option>
                                    <option value="10"<?php echo (isset($_GET['month']) && $_GET['month'] == 10) ? " selected" : ""; ?>>October</option>
                                    <option value="11"<?php echo (isset($_GET['month']) && $_GET['month'] == 11) ? " selected" : ""; ?>>November</option>
                                    <option value="12"<?php echo (isset($_GET['month']) && $_GET['month'] == 12) ? " selected" : ""; ?>>December</option>
                                </select>
                            </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <select class="form-control select2" id="year" name="year">
                                <option></option>
                                <option<?php echo (isset($_GET['year']) && $_GET['year'] == 2017) ? " selected" : ""; ?>>2017</option>
                                <option<?php echo (isset($_GET['year']) && $_GET['year'] == 2018) ? " selected" : ""; ?>>2018</option>
                                <option<?php echo (isset($_GET['year']) && $_GET['year'] == 2019) ? " selected" : ""; ?>>2019</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md col-sm col-xs">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>Salary</h1>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>Basic Salary</th>
                                <td><?php echo $employee['salary']['basic_salary']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Allowance</th>
                                <td><?php echo $employee['total_allowances']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Deduction</th>
                                <td><?php echo $employee['total_deductions']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Salary</th>
                                <td><?php echo $employee['salary']['basic_salary'] + $employee['total_allowances'] - $employee['total_deductions'];?></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h1>Allowances</h1>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th>Medical Allowance</th>
                                    <td><?php echo $employee["salary"]["allowances"]["medical"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Travel Allowance</th>
                                    <td><?php echo $employee["salary"]["allowances"]["travel"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Home Rent Allowance</th>
                                    <td><?php echo $employee["salary"]["allowances"]["home_rent"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Special Allowance</th>
                                    <td><?php echo $employee["salary"]["allowances"]["special"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Child Educ Allowance</th>
                                    <td><?php echo $employee["salary"]["allowances"]["child_education"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Servant Allowance</th>
                                    <td><?php echo $employee["salary"]["allowances"]["servant"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total allowances</th>
                                    <td style="font-weight: bold"><?php echo $employee['total_allowances']?></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h1>Deductions</h1>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th scope="row">Professional Tax</th>
                                    <td><?php echo $employee["salary"]["deductions"]["professional_tax"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Income Tax</th>
                                    <td><?php echo $employee["salary"]["deductions"]["income_tax"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Provident Fund</th>
                                    <td><?php echo $employee["salary"]["deductions"]["provident_fund"]?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Other deductions</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total deductions</th>
                                    <td style="font-weight: bold"><?php echo $employee['total_deductions']?></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div>
                <?php if(isset($employee["salary"]["status"]) && $employee["salary"]["status"] == "unpaid"): ?>
                    <form method="post">
                        <button class="btn btn-primary">Generate Payslip</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $('select#month').select2({
            placeholder: "Month"
        });
        $('select#year').select2({
            placeholder: "Year"
        });
    });
</script>

</body>

</html>