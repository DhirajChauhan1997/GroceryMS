<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
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





<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<!-- File export -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Main Category</h4>
					<h6 class="card-subtitle">Manage Main Category</a></h6>
					<input type="text" id="keywords" placeholder="Type keywords to filter posts" onkeyup="searchFilter()" />
					<select id="sortBy" onchange="searchFilter()">
						<option value="">Sort By</option>
						<option value="asc">Ascending</option>
						<option value="desc">Descending</option>
					</select>
					<div class="table-responsive">
						<?php if (!empty($datalst)) { ?>
							<table id="file_export" class="table table-striped table-bordered display">
								<thead>
									<tr>
										<th>Cat ID</th>
										<th>Category</th>
										<th>Category Logo</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($datalst as $d) { ?>
										<tr>
											<td><?php echo $d["cat_id"]; ?></td>
											<td><?php echo $d["cat_name"]; ?></td>
											<td><?php echo $d["cat_logo"]; ?></td>
											<td><a class="btn btn-primary" href="<?php echo base_url(); ?>categoryEdit/<?php echo $d["cat_id"]; ?>">Edit</a></td>
											<td><a class="btn btn-danger" href="<?php echo base_url(); ?>categoryDelete/<?php echo $d["cat_id"];  ?>">Delete</a></td>
										</tr>
									<?php
										}
										?>
								</tbody>



								<!-- <tfoot>
								<tr>
									<th>Name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Age</th>
									<th>Start date</th>
									<th>Salary</th>
								</tr>
							</tfoot> -->
							</table>
						<?php } else { ?>
							<p>Post(s) not available.</p>
						<?php } ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="row">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ============================================================== -->
	<!-- End Container fluid  -->

	<script>
		function confirmDelete(id) {
			var url = "<?php echo base_url(); ?>";
			bootbox.confirm({
				title: "Destroy planet?",
				message: "Do you want to activate the Deathstar now? This cannot be undone.",
				buttons: {
					cancel: {
						label: '<i class="fa fa-times"></i> Cancel'
					},
					confirm: {
						label: '<i class="fa fa-check"></i> Confirm'
					}
				},
				callback: function(result) {
					if (result) {
						console.log('This was logged in the callback: ' + result);
						window.location = url + "categoryDelete/" + id;
					} else {
						console.log('This was logged in the callback: ' + result);
						return false;
					}

				}
			});
		}
	</script>
