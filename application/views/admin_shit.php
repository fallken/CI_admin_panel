<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin_shit.css">

<div class="row" >
	<div class="col-lg-2 col-sm-6 "></div>
	<div class="col-lg-2 col-sm-6 ">
		<div class="circle-tile">
			<a href="#">
				<div class="circle-tile-heading dark-blue">
					<i class="fa fa-users fa-fw fa-3x"></i>
				</div>
			</a>
			<div class="circle-tile-content dark-blue">
				<div class="circle-tile-description text-faded">
					<?php echo $users; ?>
				</div>
				<div class="circle-tile-number text-faded">
					<b>Users</b>
					<span id="sparklineA"></span>
				</div>
				<a href="<?php echo base_url(); ?>index.php/welcome/show/users" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-sm-6">
		<div class="circle-tile">
			<a href="#">
				<div class="circle-tile-heading green">
					<i class="fa fa-cloud fa-fw fa-3x"></i>
				</div>
			</a>
			<div class="circle-tile-content green">
				<div class="circle-tile-description text-faded">
					<?php echo $posts; ?>
				</div>
				<div class="circle-tile-number text-faded">
                    <b>Posts</b>
				</div>
				<a href="<?php echo base_url(); ?>index.php/welcome/show/posts" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-sm-6">
		<div class="circle-tile">
			<a href="#">
				<div class="circle-tile-heading red">
					<i class="fa fa-bug fa-fw fa-3x"></i>
				</div>
			</a>
			<div class="circle-tile-content red">
				<div class="circle-tile-description text-faded">
					<?php echo $bugs; ?>
				</div>
				<div class="circle-tile-number text-faded">
                    <b>Bugs</b>
				</div>
				<a href="<?php echo base_url(); ?>index.php/welcome/show/bugs" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
			</div>
		</div>
	</div>


	<div class="col-lg-2 col-sm-6">
		<div class="circle-tile">
			<a href="#">
				<div class="circle-tile-heading purple">
					<i class="fa fa-bookmark fa-fw fa-3x"></i>
				</div>
			</a>
			<div class="circle-tile-content purple">
				<div class="circle-tile-description text-faded">
					<?php echo $post_cat; ?>
				</div>
				<div class="circle-tile-number text-faded">
                    <b>Cats</b>
                    <span id="sparklineD"></span>
				</div>
				<a href="<?php echo base_url(); ?>index.php/welcome/show/post_cats" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
			</div>
		</div>
	</div>
<!--now i will try to create a panel to show some info to the user-->
    <div class="col-md-4">
        <div class="col-md-12">
            <div class="panel panel-primary
">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <b>اخرین نظرات</b></h3>
                </div>
                <ul class="list-group">
					<?php
					$i = 1;
					foreach ($post_rank as $item){
						if($i==6){break;}else{ echo '<li class="list-group-item text-right"><div class="col-xs-11 pull-right">'.$item->title.'</div>              '.$item->views.'</li>';}
						$i++;
					}
					?>

                </ul>
            </div></div>
    </div>
    <!--    THE list in the mid -->
    <div class="col-md-4"><div class="panel panel-default
">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <b>پست های محبوب</b></h3>
            </div>
            <ul class="list-group">
				<?php
				$i = 1;
				foreach ($post_rank as $item){
					if($i==6){break;}else{ echo '<li class="list-group-item text-right"><div class="col-xs-11 pull-right">'.$item->title.'</div>              '.$item->views.'</li>';}
					$i++;
				}
				?>

            </ul>
        </div></div>
<!--the third one-->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-danger
">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <b>پست های محبوب این هفته</b></h3>
                </div>
                <ul class="list-group">
                    <?php
                    $i = 1;
                    foreach ($post_rank_weekly as $item){
                        if($i==6){break;}else{ echo '<li class="list-group-item text-right"><div class="col-xs-11 pull-right">'.$item->title.'</div>              '.$item->views.'</li>';}
						$i++;
                    }
                    ?>

                </ul>
            </div>
        </div>

</div>
<!--    the third table-->
