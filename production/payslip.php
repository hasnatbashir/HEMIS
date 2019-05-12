<!DOCTYPE html>
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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a class="site_title" href="index.html"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
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
                                        <li><a href="index.html">Service</a></li>
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
                                        <td>12,000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Allowance</th>
                                        <td>12,000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Deduction</th>
                                        <td>4,000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Salary</th>
                                        <td>20,000</td>
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
                                            <td>4,000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Travel Allowance</th>
                                            <td>2,000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Home Rent Allowance</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Special Allowance</th>
                                            <td>2,000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Child Educ Allowance</th>
                                            <td>3,000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Servant Allowance</th>
                                            <td>1,000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total allowances</th>
                                            <td style="font-weight: bold">12,000</td>
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
                                            <td>1,000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Income Tax</th>
                                            <td>2,000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Provident Fund</th>
                                            <td>500</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Advances/Loans</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Other deductions</th>
                                            <td>500</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total deductions</th>
                                            <td style="font-weight: bold">4,000</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            HEMIS - <a href="index.html">Payroll System</a>
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