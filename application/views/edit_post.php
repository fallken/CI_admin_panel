<?php include ('side_bar.php');?>

<form method="post" action="<?php echo base_url(); ?>index.php/welcome/edit/<?php echo $post_info[0]->id;?> " enctype="multipart/form-data">

	<div class="col-md-2"></div>
	<div class="col-md-4">
		<div class="panel panel-default panel-table" style="margin-top: 90px;">
			<div class="panel-heading">
				<h3 class="panel-title"><b> تدوین پست</b></h3>
				<?php
                if (isset($_SESSION['update_yes'])){
                    echo '<div class=" btn-success" style="margin-top: 80px;">'.$_SESSION['update_yes'].'</div>';
                }if(isset($_SESSION['update_no'])){
                    echo '<div class="btn-danger" style="margin-top: 80px;">'.$_SESSION['update_no'].'</div>';
                }
                if (isset($_SESSION['update_success'])){
					echo '<div class=" btn-success" style="margin-top: 80px;">'.$_SESSION['update_success'].'</div>';
				}if(isset($_SESSION['update_failure'])){
					echo '<div class="btn-danger" style="margin-top: 80px;">'.$_SESSION['update_failure'].'</div>';
				}
				?>
				<div class="form-group" style="margin-top: 90px;">
					<label for="title"><b>عنوان</b></label>

					<input name="post_name" type="text" class="form-control" id="cat_name" placeholder="title" value="<?php echo $post_info[0]->title; ?>"
						   required>
					<br>
					<br>
					<div class="form-group">
						<label for="cat_id"><b>توضیحات</b></label>
						<textarea name="post_body" class="form-control"
								  rows="10" value=""><?php echo urldecode($post_info[0]->text); ?></textarea>
					</div>
					<div class="form-group">
						<label for="cat_id"><b>دسته</b></label>
						<select id="post_cat" name="post_cat" class="form-control"  required>
							<?php

							foreach ($cat_list as $item) {
								if ($post_info[0]->cat_id == $item->id){
									echo "<option selected=". $item->name ." value='" . $item->id . "'>" . $item->name . "</option>";
								}else{
								echo "<option  value='" . $item->id . "'>" . $item->name . "</option>";
							}}

							?>
						</select>
					</div>
					<br>
					<label for="image"><b>تصویر</b></label>
                    <div class="col-md-5">
                    <input name="image" type="file" class="form-control" id="image"  required>
                    </div>
                    <div class="col-md-7">
                        <?php
                        $image_address='images/'.$post_info[0]->img;
                        if(file_exists($image_address)){ ?>
                        <img src="<?php echo base_url().'images/'.$post_info[0]->img?>" class="img-rounded" style="width:200px;height:150px;">
                        <?php }else{ ?>
                            <img src="<?php echo base_url().'images/no-image-icon-11.PNG'?>" class="img-rounded" style="width:200px;height:150px;">

                        <?php } ?>
                    </div>

				</div>
				<button class="btn btn-danger" role="button">submit</button>
                <script>
                    CKEDITOR.replace('post_body');
                </script>
</form>
</div>
</div>
<div class="col-md-3"></div>