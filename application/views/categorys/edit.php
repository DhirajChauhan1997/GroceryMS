<div class="row">
	<div class="col-lg-12">
		<h2>Category Crud
			<div class="pull-right">
				<a href="<?php echo base_url('categorys'); ?>" class="btn btn-primary">Go Back</a>
			</div>
		</h2>
	</div>
</div>
<div class="table-responsive">
	<form method="POST" action="<?php echo base_url(); ?>CategoryController/update">
		<input type="hidden" name="cat_id" value="<?php echo $data['cat_id'] ?>">

		<div class="form-group">
			<label for="cat_name">Category</label>
			<input type="text" value="<?php echo $data['cat_name'] ?>" class="form-control" name="cat_name" placeholder="Category Name">
		</div>

		<div class="form-group">
			<label for="cat_logo">Category Logo</label>
			<input type="text" value="<?php echo $data['cat_logo'] ?>" class="form-control" name="cat_logo" placeholder="Logo">
		</div>
		<input type="submit" name="Create New" class="btn btn-primary">
	</form>
</div>
