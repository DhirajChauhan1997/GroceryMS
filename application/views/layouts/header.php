<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
	<title>Grocery Management System</title>
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/extra-libs/c3/c3.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/dist/css/style.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/select2/dist/css/select2.min.css">

	<script>
		function searchFilter(page_num) {
			page_num = page_num ? page_num : 0;
			var keywords = $('#keywords').val();
			var sortBy = $('#sortBy').val();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>posts/ajaxPaginationData/' + page_num,
				data: 'page=' + page_num + '&keywords=' + keywords + '&sortBy=' + sortBy,
				beforeSend: function() {
					$('.loading').show();
				},
				success: function(html) {
					$('#postList').html(html);
					$('.loading').fadeOut("slow");
				}
			});
		}
	</script>
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">
		<!-- ============================================================== -->
		<!-- Topbar header - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<header class="topbar">
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<div class="navbar-header">
					<!-- This is for the sidebar toggle which is visible on mobile only -->
					<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
					<!-- ============================================================== -->
					<!-- Logo -->
					<!-- ============================================================== -->
					<a class="navbar-brand" href="index.html">
						<!-- Logo icon -->
						<b class="logo-icon">
							<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
							<!-- Dark Logo icon -->
							<img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
							<!-- Light Logo icon -->
							<img src="<?php echo base_url(); ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
						</b>
						<!--End Logo icon -->
						<!-- Logo text -->
						<span class="logo-text">
							<!-- dark Logo text -->
							<img src="<?php echo base_url(); ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
							<!-- Light Logo text -->
							<img src="<?php echo base_url(); ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
						</span>
					</a>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- Toggle which is visible on mobile only -->
					<!-- ============================================================== -->
					<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<div class="navbar-collapse collapse" id="navbarSupportedContent">
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav float-left mr-auto">
						<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

						<li class="nav-item dropdown mega-dropdown"><a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="d-none d-md-block">Mega <i class="fa fa-angle-down"></i></span>
								<span class="d-block d-md-none"><i class="mdi mdi-dialpad font-24"></i></span>
							</a>
							<div class="dropdown-menu animated bounceInDown">
								<div class="mega-dropdown-menu row">
									<div class="col-lg-3 col-xlg-2 m-b-30">
										<h4 class="m-b-20">CAROUSEL</h4>
										<!-- CAROUSEL -->
										<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner" role="listbox">
												<div class="carousel-item active">
													<div class="container p-0"> <img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/big/img1.jpg" alt="First slide"></div>
												</div>
												<div class="carousel-item">
													<div class="container p-0"><img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/big/img2.jpg" alt="Second slide"></div>
												</div>
												<div class="carousel-item">
													<div class="container p-0"><img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/big/img3.jpg" alt="Third slide"></div>
												</div>
											</div>
											<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
											<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
										</div>

									</div>
									<div class="col-lg-3 m-b-30">
										<h4 class="m-b-20">ACCORDION</h4>

										<div id="accordion">
											<div class="card m-b-5">
												<div class="card-header" id="headingOne">
													<h5 class="mb-0">
														<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															Collapsible Group Item #1
														</button>
													</h5>
												</div>
												<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
													<div class="card-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry.
													</div>
												</div>
											</div>
											<div class="card m-b-5">
												<div class="card-header" id="headingTwo">
													<h5 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
															Collapsible Group Item #2
														</button>
													</h5>
												</div>
												<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
													<div class="card-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry.
													</div>
												</div>
											</div>
											<div class="card m-b-5">
												<div class="card-header" id="headingThree">
													<h5 class="mb-0">
														<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															Collapsible Group Item #3
														</button>
													</h5>
												</div>
												<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
													<div class="card-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry.
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-3  m-b-30">
										<h4 class="m-b-20">CONTACT US</h4>

										<form>
											<div class="form-group">
												<input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Enter email"> </div>
											<div class="form-group">
												<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
											</div>
											<button type="submit" class="btn btn-info">Submit</button>
										</form>
									</div>
									<div class="col-lg-3 col-xlg-4 m-b-30">
										<h4 class="m-b-20">List style</h4>

										<ul class="list-style-none">
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
											<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
								<span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li> -->
						<!-- ============================================================== -->
						<!-- Search -->
						<!-- ============================================================== -->
						<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
							<form class="app-search position-absolute">
								<input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
							</form>
						</li>
					</ul>
					<!-- ============================================================== -->
					<!-- Right side toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav float-right">
						<!-- ============================================================== -->
						<!-- create new -->
						<!-- ============================================================== -->
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flag-icon flag-icon-us"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right  animated bounceInDown" aria-labelledby="navbarDropdown2">
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a>
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a>
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
							</div>
						</li> -->
						<!-- ============================================================== -->
						<!-- Comment -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>

							</a>
							<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
								<span class="with-arrow"><span class="bg-primary"></span></span>
								<ul class="list-style-none">
									<li>
										<div class="drop-title bg-primary text-white">
											<h4 class="m-b-0 m-t-5">4 New</h4>
											<span class="font-light">Notifications</span>
										</div>
									</li>
									<li>
										<div class="message-center notifications">
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
												<div class="mail-contnet">
													<h5 class="message-title">Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
												<div class="mail-contnet">
													<h5 class="message-title">Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
												<div class="mail-contnet">
													<h5 class="message-title">Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
												<div class="mail-contnet">
													<h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
												</div>
											</a>
										</div>
									</li>
									<li>
										<a class="nav-link text-center m-b-5 text-dark" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</div>
						</li>
						<!-- ============================================================== -->
						<!-- End Comment -->
						<!-- ============================================================== -->
						<!-- ============================================================== -->
						<!-- Messages -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>

							</a>
							<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
								<span class="with-arrow"><span class="bg-danger"></span></span>
								<ul class="list-style-none">
									<li>
										<div class="drop-title text-white bg-danger">
											<h4 class="m-b-0 m-t-5">5 New</h4>
											<span class="font-light">Messages</span>
										</div>
									</li>
									<li>
										<div class="message-center message-body">
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
												<div class="mail-contnet">
													<h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/2.jpg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
												<div class="mail-contnet">
													<h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/3.jpg" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
												<div class="mail-contnet">
													<h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="message-item">
												<span class="user-img"> <img src="<?php echo base_url(); ?>assets/images/users/4.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
												<div class="mail-contnet">
													<h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
												</div>
											</a>
										</div>
									</li>
									<li>
										<a class="nav-link text-center link text-dark" href="javascript:void(0);"> <b>See all e-Mails</b> <i class="fa fa-angle-right"></i> </a>
									</li>
								</ul>
							</div>
						</li>
						<!-- ============================================================== -->
						<!-- End Messages -->
						<!-- ============================================================== -->
						<!-- ============================================================== -->
						<!-- User profile and search -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
							<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
								<span class="with-arrow"><span class="bg-primary"></span></span>
								<div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
									<div class=""><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
									<div class="m-l-10">
										<h4 class="m-b-0"><?php echo $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname'); ?></h4>
										<p class=" m-b-0"><?php echo $this->session->userdata('email'); ?></p>
									</div>
								</div>
								<a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
								<!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
								<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a> -->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo site_url('AuthController/logout'); ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
								<div class="dropdown-divider"></div>
								<div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
							</div>
						</li>
						<!-- ============================================================== -->
						<!-- User profile and search -->
						<!-- ============================================================== -->
					</ul>
				</div>
			</nav>
		</header>
		<!-- ============================================================== -->
		<!-- End Topbar header -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<!-- User Profile-->
						<li>
							<!-- User Profile-->
							<div class="user-profile d-flex no-block dropdown m-t-20">
								<div class="user-pic"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
								<div class="user-content hide-menu m-l-10">
									<a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<h5 class="m-b-0 user-name font-medium"><?php echo $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname'); ?><i class="fa fa-angle-down"></i></h5>
										<span class="op-5 user-email"><?php echo $this->session->userdata('email'); ?></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
										<a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
										<!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
										<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a> -->
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo site_url('AuthController/logout'); ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
									</div>
								</div>
							</div>
							<!-- End User Profile-->
						</li>
						<li class="p-15 m-t-10"><a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New</span> </a></li>
						<!-- User Profile-->
						<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>


						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-notification-clear-all"></i><span class="hide-menu">Manage User</span></a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewUser' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
								<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageUsers' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage User</span></a></li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">User Role</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewUserRole' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add User Role</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageUsersRole' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage User Role</span></a></li>
									</ul>
								</li>
							</ul>
						</li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-notification-clear-all"></i><span class="hide-menu">User Address</span></a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewAddress'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
								<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageAddress'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Address</span></a></li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Address Type</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewAddressType'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add Address Type</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageAddressType'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Address Type</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">City</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewCity'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add City</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageCity'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage City</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">State</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewState'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add State</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageState'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage State</span></a></li>
									</ul>
								</li>
							</ul>
						</li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-notification-clear-all"></i><span class="hide-menu">Product's</span></a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item"><a href="<?php echo base_url() . "index.php/CreateNewProduct"; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
								<li class="sidebar-item"><a href="<?php echo base_url() . "index.php/ManageProduct"; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Product</span></a></li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Barand</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . "index.php/CreateNewBrand"; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . "index.php/ManageBrand"; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Brand</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Offer</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewProductOffer' ?>"" class=" sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageProductOffer' ?>"" class=" sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Offerce</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Coupans</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewCoupan' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageCoupan' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Coupans</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Review</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewProductReview' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageProductReview' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Review</span></a></li>
									</ul>
								</li>

								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product In Cart</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewCart' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageCart' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Cart</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Weight Unit</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewWeightUnit' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageWeightUnit' ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Unit's</span></a></li>
									</ul>
								</li>

							</ul>
						</li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-notification-clear-all"></i><span class="hide-menu">Shipment</span></a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
								<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Shipment</span></a></li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Order</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Order</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Invoice</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Invoice</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Payment</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Payment</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Purchase Return</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Purchase Return</span></a></li>
									</ul>
								</li>

								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Purchase Return Reason</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Reason</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Product Order History</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage History</span></a></li>
									</ul>
								</li>

							</ul>
						</li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-notification-clear-all"></i><span class="hide-menu">Category's</span></a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewMainCategory'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
								<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageMainCategory'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Category</span></a></li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Sub Category</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/CreateNewSubCategory'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="<?php echo base_url() . 'index.php/ManageSubCategory'; ?>" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Sub Category</span></a></li>
									</ul>
								</li>
								<!-- <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Mini Sub Category</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Mini sub </span></a></li>
									</ul>
								</li> -->

							</ul>
						</li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-notification-clear-all"></i><span class="hide-menu">Customer Support's</span></a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
								<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage Support</span></a></li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">FAQ</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Add New</span></a></li>
										<li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">Manage FAQ</span></a></li>
									</ul>
								</li>

							</ul>
						</li>


						<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Extra</span></li>
						<!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://wrappixel.com/demos/admin-templates/xtreme-admin/docs/documentation.html" aria-expanded="false"><i class="mdi mdi-content-paste"></i><span class="hide-menu">Documentation</span></a></li> -->
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('AuthController/logout'); ?>" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
					</ul>
				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>

		<div class="page-wrapper">
