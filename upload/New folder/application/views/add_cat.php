<?php include ('side_bar.php');?>

<form method="post" action="<?php echo base_url(); ?>index.php/welcome/add_cat" enctype="multipart/form-data">

	<div class="col-md-2"></div>
	<div class="col-md-4">
        <div class="panel panel-default panel-table" style="margin-top: 90px;">
            <div class="panel-heading">
                <h3 class="panel-title"><b>اضافه سازی دسته</b></h3>
		<?php if (isset($_SESSION['success']))echo '<div style="margin-top: 80px;" class="btn-success">'.$_SESSION['success'].'</div>'; ?>
		<?php if (isset($_SESSION['failure']))echo '<div style="margin-top: 80px;" class="btn-danger">'.$_SESSION['failure'].'</div>';  ?>
	<div class="form-group" style="margin-top: 90px;">
		<label for="title"><b>نام دسته</b></label>
		<input name="cat_name" type="text" class="form-control" id="cat_name" placeholder="title"
			   required>
		<br>
		<br>
        <label for="image"><b>تصویر</b></label>

        <input name="image" type="file" class="form-control" id="image" required>

	</div>
                <br>
	<button class="btn btn-danger" role="button"><b>اضافه کن</b></button>
	</form>
</div>

