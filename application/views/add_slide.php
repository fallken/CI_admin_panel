<?php include ('side_bar.php');?>

<form method="post" action="<?php echo base_url(); ?>index.php/welcome/add_slide" enctype="multipart/form-data">

	<div class="col-md-2"></div>

	<div class="col-md-4">
        <div class="panel panel-default panel-table" style="margin-top: 90px;">
            <div class="panel-heading">
                <h3 class="panel-title"><b>اضافه سازی اسلاید</b></h3>
		<?php if (isset($_SESSION['success']))echo '<div style="margin-top: 80px;" class="btn-success">'.$_SESSION['success'].'</div>'; ?>
		<?php if (isset($_SESSION['failure']))echo '<div style="margin-top: 80px;" class="btn-danger">'.$_SESSION['failure'].'</div>';  ?>
		<div class="form-group" style="margin-top: 90px;">
			<label for="title"><b>نام اسلاید</b></label>
			<input name="slide_name" type="text" class="form-control" id="slide_name" placeholder="only english titles"
				   required>
			<br>
			<br>
			<div class="form-group">
                <label for="title"><b>توضیحات اسلاید</b></label>
                                <textarea name="slide_body" class="form-control"
										  rows="3"></textarea>
			</div>
			<br>
            <label for="title"><b>تصویر</b></label>
			<input name="image" type="file" class="form-control" id="image" required>

		</div>
		<button class="btn btn-danger" role="button"><b>اضافه کن</b></button>
                <script>
                    CKEDITOR.replace('slide_body');
                </script>
</form>
</div>
