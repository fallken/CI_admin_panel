<?php include ('side_bar.php');?>

<form method="post" action="<?php echo base_url(); ?>index.php/welcome/add_post" enctype="multipart/form-data">

    <div class="col-md-2"></div>
    <div class="col-md-4">
        <div class="panel panel-default panel-table" style="margin-top: 90px;">
            <div class="panel-heading">
                <h3 class="panel-title"><b>ایجاد پست</b></h3>
		<?php if (isset($_SESSION['post_created'])){
			echo '<div class=" btn-success" style="margin-top: 80px;">'.$_SESSION['post_created'].'</div>';
		}if(isset($_SESSION['post_failure'])){
			echo '<div class="btn-success" style="margin-top: 80px;>'.$_SESSION['post_failure'].'</div>';
		}
		?>
        <div class="form-group" style="margin-top: 90px;">
            <label for="title"><b>عنوان</b></label>
            <input name="post_name" type="text" class="form-control" id="cat_name" placeholder="title"
                   required>
            <br>
            <br>
            <div class="form-group">
                <label for="cat_id"><b>توضیحات</b></label>
                                <textarea name="post_body" class="form-control"
                                          rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="cat_id"><b>دسته</b></label>
                <select id="post_cat" name="post_cat" class="form-control" required>
					<?php
					foreach ($cat_list as $item) {
					    echo "<option value='" . $item->id . "'>" . $item->name . "</option>";
					}

					?>
                </select>
            </div>
            <br>
            <label for="image"><b>تصویر</b></label>
            <input name="image" type="file" class="form-control" id="image" required>

        </div>
        <button class="btn btn-danger" role="button">submit</button>
                <script>
                    CKEDITOR.replace('post_body');
                </script>
</form>
</div>
</div>
<div class="col-md-3"></div>