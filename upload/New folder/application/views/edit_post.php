<?php include ('side_bar.php');?>

<form method="post" action="<?php echo base_url(); ?>index.php/welcome/edit_post/"<?php echo $project_info->id;?>enctype="multipart/form-data">

	<div class="col-md-2"></div>
	<div class="col-md-4">
		<div class="panel panel-default panel-table" style="margin-top: 90px;">
			<div class="panel-heading">
				<h3 class="panel-title"><b> تدوین پست</b></h3>
				<?php if (isset($_SESSION['update_success'])){
					echo '<div class=" btn-success" style="margin-top: 80px;">'.$_SESSION['update_success'].'</div>';
				}if(isset($_SESSION['update_failure'])){
					echo '<div class="btn-success" style="margin-top: 80px;">'.$_SESSION['update_failure'].'</div>';
				}
				?>
				<div class="form-group" style="margin-top: 90px;">
					<label for="title"><b>عنوان</b></label>
					<?php print_r($post_info);  ?>
					<input name="post_name" type="text" class="form-control" id="cat_name" placeholder="title" value="<?php echo $post_info->title; ?>"
						   required>
					<br>
					<br>
					<div class="form-group">
						<label for="cat_id"><b>توضیحات</b></label>
						<textarea name="post_body" class="form-control"
								  rows="3" value="<?php echo $post_info->text; ?>"></textarea>
					</div>
					<div class="form-group">
						<label for="cat_id"><b>دسته</b></label>
						<select id="post_cat" name="post_cat" class="form-control"  required>
							<?php
							foreach ($cat_list as $item) {
								if ($post_info->cat_id == $item->id){
									echo "<option selected=". $item->name ." value='" . $item->id . "'>" . $item->name . "</option>";
								}else{
								echo "<option  value='" . $item->id . "'>" . $item->name . "</option>";
							}}

							?>
						</select>
					</div>
					<br>
					<label for="image"><b>تصویر</b></label>
					<input name="image" type="file" class="form-control" id="image" value="<?php echo $post_info->img; ?>" required>

				</div>
				<button class="btn btn-danger" role="button">submit</button>
</form>
</div>
</div>
<div class="col-md-3"></div>