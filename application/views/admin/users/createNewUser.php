<div class="page-breadcrumb">
	<div class="row">
		<div class="col-5 align-self-center">
			<h4 class="page-title">Form Basic</h4>
			<div class="d-flex align-items-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Library</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="col-7 align-self-center">
			<div class="d-flex no-block justify-content-end align-items-center">
				<div class="m-r-10">
					<div class="lastmonth"></div>
				</div>
				<div class=""><small>LAST MONTH</small>
					<h4 class="text-info m-b-0 font-medium">$58,256</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<!-- /.row -->
	<div class="row">
		<div class="col-12">
			<div class="card card-body">
				<h4 class="card-title">User Add Form</h4>
				<h5 class="card-subtitle">Enter User Basic Detail's</h5>
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<form method="POST">
							<div class="form-group">
								<label for="exampleInputEmail111">User Type</label>
								<select id="role" value=" <?php echo !empty($member['role']) ? $member['role'] : ''; ?> name=" role" class="select2 form-control custom-select" style="width: 100%; height:36px;">
									<option>No Selected</option>
									<option value="saller">Saller</option>
									<option value="user">User</option>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail111">First Name</label>
								<input type="text" name="firstname" value="<?php echo !empty($member['firstname']) ? $member['firstname'] : ''; ?>" class="form-control" id="exampleInputEmail111" placeholder="Enter Username">
								<?php echo form_error('firstname', '<div style="color:red">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail12">Last Name</label>
								<input type="text" name="lastname" value="<?php echo !empty($member['lastname']) ? $member['lastname'] : ''; ?>" class="form-control" id="exampleInputEmail12" placeholder="Enter email">
								<?php echo form_error('lastname', '<div style="color:red">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword11">Mobile No</label>
								<input type="number" name="mobno" value="<?php echo !empty($member['mobno']) ? $member['mobno'] : ''; ?>" class="form-control" id="exampleInputPassword11" placeholder="Password">
								<?php echo form_error('mobno', '<div style="color:red">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail111">User Name</label>
								<input type="text" name="username" value="<?php echo !empty($member['username']) ? $member['username'] : ''; ?>" class="form-control" id="exampleInputEmail111" placeholder="Enter Username">
								<?php echo form_error('username', '<div style="color:red">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail12">Email address</label>
								<input type="email" name="email" value="<?php echo !empty($member['email']) ? $member['email'] : ''; ?>" class="form-control" id="exampleInputEmail12" placeholder="Enter email">
								<?php echo form_error('email', '<div style="color:red">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword11">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword11" placeholder="Password">
								<?php echo form_error('password', '<div style="color:red">', '</div>'); ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword12">Password</label>
								<input type="password" name="cpassword" class="form-control" id="exampleInputPassword12" placeholder="Confirm Password">
								<?php echo form_error('cpassword', '<div style="color:red">', '</div>'); ?>
							</div>

							<input type="submit" name="formSubmit" class="btn btn-success m-r-10" value="Submit"></input>
							<a href="<?php echo base_url() . "index.php/UsersController/index"; ?>" class="btn btn-dark">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</div>
