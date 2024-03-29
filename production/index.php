<!DOCTYPE html>
<?php
include 'connect.php';
$sql = "Select * from employee";
$result = $conn->query($sql);

if (isset($_GET['searchBtn'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM employee WHERE (employee_id = '$search') OR (employee_name LIKE '%$search%') OR
        (joining_date LIKE '%$search%') OR (employment_category LIKE '%$search%')
        OR (employment_status LIKE '%$search%')";
    $result = $conn->query($sql);
}

?>

<html lang="en">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="images/favicon.ico" rel="icon" type="image/ico"/>

    <title>Service</title>

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
                                    <li><a> Reports <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
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

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->

            <!-- /top tiles -->

            <div class="row">
                <form action="#" method="GET">
                    <div class="title_right">
                        <div class="col-md-3 col-sm-9 col-xs-12">
                            <select class="form-control">
                                <option>Lower Limit Salary</option>
                                <option>Option one</option>
                                <option>Option two</option>
                                <option>Option three</option>
                                <option>Option four</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                            <select class="form-control">
                                <option>Upper Limit Salary</option>
                                <option>Option one</option>
                                <option>Option two</option>
                                <option>Option three</option>
                                <option>Option four</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input class="form-control" name="search" placeholder="Search for..." type="text">
                                <span class="input-group-btn">
                                    <button name="searchBtn" type="submit" class="btn btn-default"
                                            type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h1>Employees</h1>
                            <div class="clearfix"></div>
                        </div>
                        <table cellspacing="0" class="table table-striped table-bordered dt-responsive nowrap"
                               id="datatable-responsive" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Contact no</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Employment Type</th>
                                <th>Grade</th>
                                <th>Scale</th>
                                <th>Net Salary</th>
                                <th>Join date</th>
                                <th>Status</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result->num_rows > 0):
                                while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['phone_number']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['designation']; ?></td>
                                        <td><?php echo $row['employment_category']; ?></td>
                                        <td><?php echo $row['employee_grade']; ?></td>
                                        <td><?php echo $row['employee_scale']; ?></td>
                                        <td><?php echo $row['region/division']; ?></td>
                                        <td><?php echo $row['joining_date']; ?></td>
                                        <td><?php echo $row['employment_status']; ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="payslip.php?id=<?php echo $row['id']; ?>">Payslip</a>
                                            <a class="btn btn-dark" href="salary.php?id=<?php echo $row['id']; ?>">Salary</a>
                                        </td>
                                    </tr>
                                <?php endwhile;
                            else:
                                ?>
                                <p>No result!</p>
                            <?php
                            endif;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
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