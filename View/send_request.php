<?php

session_start();
if(!isset($_SESSION['username']))
{ header ("location:Login.php");

}
include_once ('../Classes/User_Actor.php');

$id_user=$_SESSION['id'];
$user=new User_Actor();


if (!empty($_POST["name"])){
    $username = $_POST["name"];
}

if(isset($_POST['send'])){
$user->sendRequest($id_user, $username);

}

//      if(isset($_POST['logout'])){
//
//                 //unset($_SESSION['username']);
//                 //session_destroy();
//                 //header("location :Login.php");
//                   //      exit();
//
//                   header("location:Login.php");
//        }




?>





<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>User</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="adminhome/assets/images/favicon.ico">

		<!-- Bootstrap CSS -->
                <link href="adminhome/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- Font Awesome CSS -->
		<link href="adminhome/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

		<!-- Custom CSS -->
		<link href="adminhome/assets/css/style.css" rel="stylesheet" type="text/css" />

		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<style>
		td.details-control {
		background: url('adminhome/assets/plugins/datatables/img/details_open.png') no-repeat center center;
		cursor: pointer;
		}
		tr.shown td.details-control {
		background: url('adminhome/assets/plugins/datatables/img/details_close.png') no-repeat center center;
		}
		</style>
		<!-- END CSS for this page -->

</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
            <a href="adminhome.php" class="logo"><img alt="Logo" src="assets/images/logo.png" /> <span>Admin</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">




				<li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">


                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="adminhome/assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Hello User</small> </h5>
                                </div>



                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> <span>Logout</span>
                                </a>


                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->


	<!-- Left Sidebar -->
	<div class="left main-sidebar">

		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">

			<ul>

					<li class="submenu">
                                            <a href="userhome.php"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>



					<li class="submenu">
                        <a href="#" class="active"><i class="fa fa-fw fa-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
                                                            <li><a href="Send_Feedback_user.php">Send Feedback</a></li>
						            <li class="active"><a href="#">Send Request</a></li>

							</ul>
                    </li>














            </ul>

            <div class="clearfix"></div>

			</div>

			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">



				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left">Data Tables</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Home</li>
											<li class="breadcrumb-item active">Data Tables</li>
										</ol>
										<div class="clearfix"></div>
								</div>
						</div>
				</div>
				<!-- end row -->





				<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-table"></i>Display All Mechanic</h3>

								</div>

								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>Count</th>
												<th>ID</th>
												<th>UserName</th>
												<th>Location</th>

											</tr>
										</thead>
										<tbody>
										<?php
                                                                                        include_once '../Database/Database.php';
                                                                                        $conn= mysqli_connect("localhost", "root", "", "project_db");
                                                                                        $query= mysqli_query($conn,"SELECT * from `mec_location`");
                                                                                        $count=1;
                                                                                        while ($result= mysqli_fetch_array($query)){

                                                                                            echo "<tr>
                                                                                            <td>$count</td>
                                                                                            <td>".$result['id_mec']."</td>
                                                                                            <td>".$result['username']."</td>
                                                                                            <td>".$result['Location']."</td>

                                                                                             </tr>";
                                                                                            $count++;
                                                                                        }



                                                                                        ?>

										</tbody>
									</table>
									</div>

								</div>
							</div><!-- end card-->
						</div>
                                    <div class="card-body">
                                                            <form method="POST" >
                                                    <label class="label--desc">Enter Username </label>
                                                    <input rows="3" class="form-control editor"  type="text" name="name" id="name" > <br>
                                                    <button type="submit"  class="btn btn-outline-success" value="send" name="send" >Send Request</button>

                                                            </form>

                                                </div>



				</div>

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="adminhome/assets/js/modernizr.min.js"></script>
<script src="adminhome/assets/js/jquery.min.js"></script>
<script src="adminhome/assets/js/moment.min.js"></script>

<script src="adminhome/assets/js/popper.min.js"></script>
<script src="adminhome/assets/js/bootstrap.min.js"></script>

<script src="adminhome/assets/js/detect.js"></script>
<script src="adminhome/assets/js/fastclick.js"></script>
<script src="adminhome/assets/js/jquery.blockUI.js"></script>
<script src="adminhome/assets/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="adminhome/assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<script>
	// START CODE FOR BASIC DATA TABLE
	$(document).ready(function() {
		$('#example1').DataTable();
	} );
	// END CODE FOR BASIC DATA TABLE


	// START CODE FOR Child rows (show extra / detailed information) DATA TABLE
	function format ( d ) {
		// `d` is the original data object for the row
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
			'<tr>'+
				'<td>Full name:</td>'+
				'<td>'+d.name+'</td>'+
			'</tr>'+
			'<tr>'+
				'<td>Extension number:</td>'+
				'<td>'+d.extn+'</td>'+
			'</tr>'+
			'<tr>'+
				'<td>Extra info:</td>'+
				'<td>And any further details here (images etc)...</td>'+
			'</tr>'+
		'</table>';
	}

		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				"ajax": "adminhome/assets/data/dataTablesObjects.txt",
				"columns": [
					{
						"className":      'details-control',
						"orderable":      false,
						"data":           null,
						"defaultContent": ''
					},
					{ "data": "name" },
					{ "data": "position" },
					{ "data": "office" },
					{ "data": "salary" }
				],
				"order": [[1, 'asc']]
			} );

			// Add event listener for opening and closing details
			$('#example2 tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = table.row( tr );

				if ( row.child.isShown() ) {
					// This row is already open - close it
					row.child.hide();
					tr.removeClass('shown');
				}
				else {
					// Open this row
					row.child( format(row.data()) ).show();
					tr.addClass('shown');
				}
			} );
		} );
		// END CODE FOR Child rows (show extra / detailed information) DATA TABLE



		// START CODE Show / hide columns dynamically DATA TABLE
		$(document).ready(function() {
			var table = $('#example3').DataTable( {
				"scrollY": "350px",
				"paging": false
			} );

			$('a.toggle-vis').on( 'click', function (e) {
				e.preventDefault();

				// Get the column API object
				var column = table.column( $(this).attr('data-column') );

				// Toggle the visibility
				column.visible( ! column.visible() );
			} );
		} );
		// END CODE Show / hide columns dynamically DATA TABLE


		// START CODE Individual column searching (text inputs) DATA TABLE
		$(document).ready(function() {
			// Setup - add a text input to each footer cell
			$('#example4 thead th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
			} );

			// DataTable
			var table = $('#example4').DataTable();

			// Apply the search
			table.columns().every( function () {
				var that = this;

				$( 'input', this.header() ).on( 'keyup change', function () {
					if ( that.search() !== this.value ) {
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
		// END CODE Individual column searching (text inputs) DATA TABLE
	</script>
<!-- END Java Script for this page -->

</body>
</html>
