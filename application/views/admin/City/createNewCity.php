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
				<h4 class="card-title">User Role Add Form</h4>
				<h5 class="card-subtitle">Enter User Role Basic Detail's</h5>
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<form method="POST">

							<div class="form-group">
								<label for="exampleInputEmail111">City</label>
								<input type="text" name="city_name" value="<?php echo !empty($member['role']) ? $member['role'] : ''; ?>" class="form-control" id="exampleInputEmail111" placeholder="Enter Username">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail111">State</label>
								<select name="state_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
									<option value="">No Selected</option>
									<?php

									foreach ($states as $key => $row) {
										?>
										<option selected="<?php if (!empty($member['state_id'])) {
																	echo $member['state_id'];
																} ?> value=" <?php echo $row->state_id; ?>"><?php echo $row->state_name; ?></option>
									<?php } ?>
								</select> </div>

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
