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
	<!-- Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header bg-info">
					<h4 class="m-b-0 text-white">Add New Brand</h4>
				</div>

				<div class="card-body">
					<h4 class="card-title">Brand Basic Info</h4>
				</div>
				<!-- Display status message -->
				<?php if (!empty($success_msg)) { ?>
					<div class="col-xs-12">
						<div class="alert alert-success"><?php echo $success_msg; ?></div>
					</div>
				<?php } elseif (!empty($error_msg)) { ?>
					<div class="col-xs-12">
						<div class="alert alert-danger"><?php echo $error_msg; ?></div>
					</div>
				<?php } ?>

				<hr>
				<div class="form-body">
					<div class="card-body">
						<form method="post">
							<div class="row p-t-20">
								<div class="col-md-6">
									<div class="form-group">
										<label>Brand Name</label>
										<input type="text" class="form-control" name="brand" placeholder="Enter Brand Name" value="<?php echo !empty($member['brand']) ? $member['brand'] : ''; ?>">
										<small class="form-control-feedback"> <?php echo form_error('brand', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>

								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label>Brand Logo</label>
										<input type="text" class="form-control" name="brand_logo" placeholder="Enter Brand Logo" value="<?php echo !empty($member['brand_logo']) ? $member['brand_logo'] : ''; ?>">
										<small class="form-control-feedback"> <?php echo form_error('brand_logo', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Brand Description</label>
										<input type="text" class="form-control" name="brand_desc" placeholder="Enter Brand Name" value="<?php echo !empty($member['brand_desc']) ? $member['brand_desc'] : ''; ?>">
										<small class="form-control-feedback"> <?php echo form_error('brand_desc', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>
								</div>
							</div>
					</div>
					<hr>
					<div class="form-actions">
						<div class="card-body">
							<input type="submit" name="memSubmit" class="btn btn-success" value="Save"> </input>
							<a href="<?php echo base_url() . "index.php/BrandController/index"; ?>" class="btn btn-dark">Cancel</a>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
