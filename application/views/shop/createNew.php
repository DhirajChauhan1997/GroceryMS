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
					<h4 class="m-b-0 text-white">Add Your Shop With Us</h4>
				</div>

				<div class="card-body">
					<h4 class="card-title">Shop Basic Info</h4>
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
										<label>Shop Name</label>
										<input type="text" class="form-control" name="shop" placeholder="Enter Brand Name" value="<?php echo !empty($member['shop']) ? $member['shop'] : ''; ?>">
										<small class="form-control-feedback"> <?php echo form_error('shop', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Select Shop Type</label>
										<select id="shoptype" name="shoptype" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">No Selected</option>
											<?php
											foreach ($shoptypes as $key => $row) {
												?>
												<option value="<?php echo $row->shop_type_id; ?>"><?php echo $row->shop_type; ?></option>
											<?php } ?>
										</select>
										<small class="form-control-feedback"> <?php echo form_error('brand_logo', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>

								</div>
							</div>
							<div class="row p-t-20">
								<div class="col-md-6">
									<div class="form-group">
										<label>Select State</label>
										<select id="state" name="state" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">No Selected</option>
											<?php
											foreach ($states as $key => $row) {
												?>
												<option value="<?php echo $row->state_id; ?>"><?php echo $row->state_name; ?></option>
											<?php } ?>
										</select>
										<small class="form-control-feedback"> <?php echo form_error('shop', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>

								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label>Select City</label>
										<select id="city" name="city" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">No Selected</option>

										</select>
										<small class="form-control-feedback"> <?php echo form_error('brand_logo', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>

								</div>
							</div>
							<div class="row p-t-20">
								<div class="col-md-6">
									<div class="form-group">
										<label>Pin Code</label>
										<input type="text" class="form-control" name="pincode" placeholder="Enter Pin Code" value="<?php echo !empty($member['pincode']) ? $member['pincode'] : ''; ?>">
										<small class="form-control-feedback"> <?php echo form_error('pincode', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label>Street</label>
										<input type="text" class="form-control" name="Street" placeholder="Enter Pin Code" value="<?php echo !empty($member['Street']) ? $member['Street'] : ''; ?>">
										<small class="form-control-feedback"> <?php echo form_error('Street', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>
									<small class="form-control-feedback"> <?php echo form_error('Street', '<div class="invalid-feedback">', '</div>'); ?></small>
								</div>

							</div>

							<div class="row p-t-20">
								<div class="col-md-6">
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" aria-label="With textarea" placeholder="Address Here"></textarea>

										<small class="form-control-feedback"> <?php echo form_error('address', '<div class="invalid-feedback">', '</div>'); ?></small>
									</div>
								</div>
								<!--/span-->
								<!-- <div class="col-md-6">
									<div class="form-group">
										<label>Street</label>
										<input type="text" class="form-control" name="Street" placeholder="Enter Pin Code" value="<?php echo !empty($member['Street']) ? $member['Street'] : ''; ?>">
										<small class="form-control-feedback"> <?php //echo form_error('Street', '<div class="invalid-feedback">', '</div>'); 
																				?></small>
									</div>
									<small class="form-control-feedback"> <?php //echo form_error('Street', '<div class="invalid-feedback">', '</div>'); 
																			?></small>
								</div> -->

							</div>


							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Shop Description</label>
										<textarea class="form-control" aria-label="With textarea" placeholder="Bio Here"></textarea>
										<small class="form-control-feedback"> <?php echo form_error('shop_desc', '<div class="invalid-feedback">', '</div>'); ?></small>
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

<script type="text/javascript">
	$(document).ready(function() {
		console.log("Loaded");
		$('#state').change(function() {
			var id = $(this).val();
			console.log(id);
			if (id != '') {
				$.ajax({
					url: "<?php echo base_url() . 'index.php/ShopController/get_city'; ?>",
					method: "POST",
					data: {
						id: id
					},
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
						}
						$('#city').html(html);

					}
				});
			} else {
				alert('Select Any One');
			}

		});

	});
</script>


<!-- <script type="text/javascript">
	$(document).ready(function() {
		console.log("Loaded");
		$('#state').change(function() {
			var id = $(this).val();
			console.log(id);
			$.ajax({
				url: "<?php echo base_url() . 'index.php/ShopController/get_city'; ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
					}
					$('#city').html(html);

				}
			});
			return false;
		});

	});
</script> -->
