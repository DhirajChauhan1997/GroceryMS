<div class="page-breadcrumb">

	<div class="row">
		<div class="col-5 align-self-center">
			<h4 class="page-title">Dashboard</h4>
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

<?php

// print_r($member);
// exit();
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Product Detail's</h4>
					<!-- <div class="alert alert-info alert-dismissible fade show" role="alert">
					<span class="badge badge-info"><i class="fas fa-info"></i></span>
					<strong> Form Action at ending of the form.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div> -->
					<h6 class="card-subtitle">To use this form you can add new product</h6>
					<!-- <h4 class="card-title">About Employee</h4> -->
				</div>
				<hr>
				<form method="POST" enctype="multipart/form-data">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="inputfname" class="control-label col-form-label">Product Name</label>
									<input type="text" value="<?php echo !empty($member['product_name']) ? $member['product_name'] : ''; ?>" class="form-control" name="product_name" placeholder="Product Name">
									<?php echo form_error('product_name', '<div style="color:red">', '</div>'); ?>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="inputlname2" class="control-label col-form-label">Quantity</label>
									<input value="<?php echo !empty($member['qty']) ? $member['qty'] : ''; ?>" type="text" class="form-control" name="qty" placeholder="Quantity">
									<?php echo form_error('qty', '<div style="color:red">', '</div>'); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="inputfname" class="control-label col-form-label">Price</label>
									<input type="text" value="<?php echo !empty($member['price']) ? $member['price'] : ''; ?>" class="form-control" name="price" placeholder="Price">
									<?php echo form_error('price', '<div style="color:red">', '</div>'); ?>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<!-- <div class="form-group">
								<label for="inputlname2" class="control-label col-form-label">Quantity</label>
								<input type="text" class="form-control" id="inputlname2" placeholder="Last Name Here">
							</div> -->
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="uname" class="control-label col-form-label">Photo</label>
									<input type="file" name="cat_logo" class="form-control">
									<img hight="100" width="100" name="cat logo" src="<?php if (!empty($member['photo'])) {
																							echo 'http://localhost:8888/GroceryMS/uploads/ProductImage/' . $member['photo'];
																						} ?>" />

									<!-- <?php //echo form_error('cat_logo', '<div style="color:red">', '</div>'); 
											?> -->
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="nname" class="control-label col-form-label">Is Active</label>
									<div class="custom-control custom-radio">
										<input value="1" type="radio" id="is_active" name="is_active" class="custom-control-input">
										<label class="custom-control-label" for="is_active">Yes</label>
									</div>
									<div class="custom-control custom-radio">
										<input value="0" type="radio" id="is_active" name="is_active" class="custom-control-input" checked="">
										<label class="custom-control-label" for="is_active">No</label>

									</div>
									<?php echo form_error('is_active', '<div style="color:red">', '</div>'); ?>

								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="card-body">
						<h4 class="card-title">Product Info &amp; Detail </h4>
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="email1" class="control-label col-form-label">Category</label>
									<select id="maincategory" name="cat_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
										<option value="">No Selected</option>
										<?php
										foreach ($category as $key => $row) {
											?>
											<option selected="<?php if (!empty($member['cat_id'])) {
																		echo $member['cat_id'];
																	} ?>" value="<?php echo $row->cat_id; ?>"><?php echo $row->cat_name; ?></option>
										<?php } ?>
									</select>
									<?php echo form_error('cat_id', '<div style="color:red">', '</div>'); ?>

								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="email1" class="control-label col-form-label">Sub Category</label>
									<select name="sub_cat_id" id="sub_cat_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
										<option>No Selected</option>
									</select>
									<?php echo form_error('sub_cat_id', '<div style="color:red">', '</div>'); ?>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- <div class="form-group">
								<label for="email1" class="control-label col-form-label">Mini Sub Category</label>
								<select name="min_sub_cat_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">


								</select>

							</div> -->
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="email1" class="control-label col-form-label">Brand</label>
									<select name="brand_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">

										<option value="">No Selected</option>
										<?php

										foreach ($brands as $key => $row) {
											?>
											<option selected="<?php if (!empty($member['brand_id'])) {
																		echo $member['brand_id'];
																	} ?>" value="<?php echo $row->brand_id; ?>"><?php echo $row->brand; ?></option>
										<?php } ?>

									</select>
									<?php echo form_error('brand_id', '<div style="color:red">', '</div>'); ?>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="email1" class="control-label col-form-label">Weight Unit</label>
									<select name="weight_unit_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">

										<option value="">No Selected</option>
										<?php

										foreach ($weightunits as $key => $row) {
											?>
											<option selected="<?php if (!empty($member['weight_unit_id'])) {
																		echo $member['weight_unit_id'];
																	} ?>" value="<?php echo $row->weight_unit_id; ?>"><?php echo $row->unit; ?></option>
										<?php } ?>

									</select>
									<?php echo form_error('weight_unit_id', '<div style="color:red">', '</div>'); ?>

								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="weight" class="control-label col-form-label">Weight</label>
									<input value="<?php echo !empty($member['weight']) ? $member['weight'] : ''; ?>" type="number" class="form-control" name="weight" placeholder="Enter Weight">
									<?php echo form_error('weight', '<div style="color:red">', '</div>'); ?>

								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="control-label col-form-label">Description</label>
								<textarea name="descr" class="form-control" aria-label="With textarea" placeholder="Bio Here">
								<?php echo !empty($member['descr']) ? $member['descr'] : ''; ?>
								</textarea>
								<?php echo form_error('descr', '<div style="color:red">', '</div>'); ?>

							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="action-form">
							<div class="form-group m-b-0 text-left">
								<input type="submit" name="formSubmit" class="btn btn-success m-r-10" value="Submit"></input>

								<!-- <input type="submit" name="formSubmit" class="btn btn-info waves-effect waves-light" value="Save"></input> -->
								<a href="<?php echo base_url(); ?>index.php/ManageProduct" class="btn btn-dark waves-effect waves-light">Cancel</a>
							</div>
						</div>


					</div>

				</form>
			</div>
			<hr>
			<!-- <div class="card-body">
				<div class="action-form">
					<div class="form-group m-b-0 text-left">
						<button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
						<button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		console.log("Loaded");

		$('#maincategory').change(function() {
			var id = $(this).val();
			console.log(id);
			$.ajax({
				url: "<?php echo base_url() . 'index.php/ProductController/get_sub_category'; ?>",
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

						html += '<option selected="<?php if (!empty($member['sub_cat_id'])) {
														echo $member['sub_cat_id'];
													} ?>" value=' + data[i].sub_cat_id + '>' + data[i].sub_cat_name + '</option>';
					}
					$('#sub_cat_id').html(html);
				}
			});
			return false;
		});
	});
</script>
