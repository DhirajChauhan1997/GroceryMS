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
				<h4 class="card-title">Product Category Add Form</h4>
				<h5 class="card-subtitle">Enter Main Categoty Basic Detail's</h5>
				<div class="row">
					<?php if (!empty($success_msg)) { ?>
						<div class="col-xs-12">
							<div class="alert alert-success"><?php echo $success_msg; ?></div>
						</div>
					<?php } elseif (!empty($error_msg)) { ?>
						<div class="col-xs-12">
							<div class="alert alert-danger"><?php echo $error_msg; ?></div>
						</div>
					<?php } ?>
					<div class="col-sm-12 col-xs-12">
						<form method="POST" enctype="multipart/form-data">

							<div class="form-group">
								<label for="exampleInputEmail111">Category Name</label>
								<input type="text" name="cat_name" value="<?php echo !empty($member['cat_name']) ? $member['cat_name'] : ''; ?>" class="form-control" id="exampleInputEmail111" placeholder="Enter Category Name">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail111">Category Logo</label>
								<input type="file" accept="image/png, image/jpeg" name="cat_logo">
								<img hight="100" width="100" name="cat logo" src="<?php if (!empty($member['cat_logo'])) {
																									echo 'http://localhost:8888/GroceryMS/uploads/CategoryImage/' . $member['cat_logo'];
																								} ?>" />

							</div>

							<input type="submit" name="formSubmit" class="btn btn-success m-r-10" value="Submit"></input>
							<a href="<?php echo base_url() . "index.php/MainCategoryController/index"; ?>" class="btn btn-dark">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
