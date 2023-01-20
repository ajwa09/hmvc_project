<div class="container-fluid p-5" style="font-family: SansSerif; font-size: 15px">
	<!-- Page-header start -->
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title p-3">
					<div class="d-inline">
						<h4>Notice</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="page-header-breadcrumb">
					<ul class="breadcrumb-title">

						<!--						<li class="breadcrumb-item">Widget</a></li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="card card-outline card-info p-3">
		<div class="card-header">
			<h3 class="card-title">
				List of Notice
			</h3>
		</div>
		<table class="table table-bordered">
			<thead>
			<tr>
				<th>Sr.</th>
				<th>Create Date</th>
				<th>Title</th>
				<th>Short Description</th>
				<th>Status</th>
				<th style="padding-left: 40px;">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($posts as $post): ?>
				<tr>
					<td><?php echo $post['id']; ?></td>
					<td><?php echo $post['current_date']; ?></td>
					<td><?php echo $post['title']; ?></td>
					<td><?php echo $post['short_description']; ?></td>
					<!--					<td>--><?php //echo ; ?>
					<td><?php
						if ($post['publication_status'] == 1) {
							echo '<span class=" btn-sm btn-success ">Published</span>';
						} else {
							echo '<span class="btn-sm btn-danger">Unpublish</span>';
						}
						?></td>
					<td>
						<a class="btn btn-primary btn-sm edit pull-left " style="margin-right: 10px;"
						   href="<?php echo  base_url(); ?>notice_board/view_notice/<?php echo $post['id']?>">view</a>
						<a class="btn btn-success btn-sm edit pull-left " style="margin-right: 10px;"
						   href="<?php echo  base_url(); ?>notice_board/fetch_notice/<?php echo $post['id']?>" >Edit</a>
						<!--delete btn-->
						<a class="btn btn-sm btn-danger del" style="margin-right: 10px; "
						   href="<?php echo  base_url(); ?>notice_board/delete_notice/<?php echo $post['id']?>"> Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>

