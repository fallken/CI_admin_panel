<?php
/**
 * Created by PhpStorm.
 * User: elomir
 * Date: 6/13/17
 * Time: 12:28 AM
 */
//foreach ($table as $item){
//}
//DONT panic its nothing special . just a simple switch and case to show content of each table thats it :) .
echo '</br>';

include ('side_bar.php');
echo '    
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
        <!-- /#page-content-wrapper -->

              
</div>   </div> 
         <div class="col col-lg-9" style="margin-top: 120px;">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-4">
                  ';
if (isset($_SESSION['post_deleted'])){
	echo '<p class="bg-success">' . $_SESSION['post_deleted'] . '</p>';
}
if (isset($_SESSION['slide_delete'])){
	echo '<p class="bg-success">' . $_SESSION['slide_delete'] . '</p>';
}
echo '
                    <h3 class="panel-title">Panel Heading</h3>
                  </div>
                   <div class="col col-xs-4 text-center">
                   ';
                    if ($table_name == 'users'){
                        echo '<form action="' . base_url() . 'index.php/welcome/search_users" method="post">
                         <!-- a form just to make the user to be able search through the desired table -->
                         <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="search" name="search" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                    </div>
            </form>';
                    }
                    elseif($table_name == 'posts'){
                        echo '<form action="' . base_url() . 'index.php/welcome/search_posts" method="post">
                         <!-- a form just to make the user to be able search through the desired table -->
                         <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="search" name="search" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                    </div>
            </form>';
                    }else{

                    }
                    echo '
                 
                
            </div>
                  <div class="col col-xs-4 text-right">
             <!-- <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button> -->
                  </div>
                </div>';
switch ($table_name) {
    case 'users':
        echo '
        
    <table class="table table-striped">
  <thead >
    <tr>
      <th>id</th>
      <th>username</th>
      <th>name</th>
      <th>email</th>
      <th>tell</th>
    </tr>
  </thead>';
        foreach ($table as $item) {
            echo '
  <tbody>
    <tr>
      <td>' . $item->id . '</td>
      <td>' . $item->username . '</td>
      <td>' . $item->name . '</td>
      <td>' . $item->email . '</td>
      <td>' . $item->tel . '</td>
    </tr>';
        }
        break;
    case 'tokens':
        echo '<table class="table table-striped">
  <thead >
    <tr>
      <th>id</th>
      <th>username</th>
      <th>time</th>
    </tr>
  </thead>';
        foreach ($table as $item) {
            echo '
  <tbody>
    <tr>
      <td>' . $item->id . '</td>
      <td>' . $item->user_id . '</td>
      <td>' . $item->time . '</td>
    </tr>';
        }
        break;
    case 'posts':
        echo '<table class="table table-striped">
  <thead >
    <tr>
      <th>id</th>
      <th>title</th>
      <th>cat_id</th>
      <th>views</th>
      <th>likes</th>
      <th>action</th>
      <th>action</th>
    </tr>
  </thead>';
        foreach ($table as $item) {
            echo '
  <tbody>
    <tr>
      <td>' . $item->id . '</td>
      <td>' . $item->title . '</td>
      <td>' . $item->cat_id . '</td>
      <td>' . $item->views . '</td>
      <td>' . $item->likes . '</td>
      <td><a href="'.base_url().'index.php/welcome/delete_post/'.$item->id.'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> delete</a></td>
      <td><a href="'.base_url().'index.php/welcome/edit_post/'.$item->id.'" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span> delete</a></td>
    </tr>';
        }
        break;
    case 'post_cats':
        echo '<table class="table table-striped">
  <thead >
    <tr>
      <th>id</th>
      <th>name</th>
    </tr>
  </thead>';
        foreach ($table as $item) {
            echo '
  <tbody>
    <tr>
      <td>' . $item->id . '</td>
      <td>' . $item->name . '</td>
    </tr>';
        }
        break;
    case 'main':
        echo '<table class="table table-striped">
  <thead >
    <tr>
      <th>name</th>
      <th>description</th>
      <th>action</th>
    </tr>
  </thead>';
        foreach ($table as $item) {
        	if ($item->var == 'slide_count'){
				echo '
  <tbody>
    <tr>
      <td>' . $item->var . '</td>
      <td>' . $item->val2 . '</td>
      
     
    </tr>';
			}
        	else{
				echo '
  <tbody>
    <tr>
      <td>' . $item->var . '</td>
      <td>' . $item->val2 . '</td>
      
      <td><a href="'.base_url().'index.php/welcome/delete_slide/'.$item->id.'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> delete</a></td>
    </tr>';
			}

        }
        break;
    case 'bugs':
        echo '<table class="table table-striped">
  <thead >
    <tr>
      <th>id</th>
      <th>email</th>
      <th>mobile_detail</th>
      <th>text</th>
      <th>name</th>
    </tr>
  </thead>';
        foreach ($table as $item) {
            echo '
  <tbody>
    <tr>
      <td>' . $item->id . '</td>
      <td>' . $item->email . '</td>
      <td>' . $item->mobile_details . '</td>
      <td>' . $item->text . '</td>
      <td>' . $item->name . '</td>
    </tr>';
        }
        break;
    case 'activations':
        echo '<table class="table table-striped">
  <thead >
    <tr>
      <th>title</th>
    </tr>
  </thead>';

        echo '
  <tbody>
    <tr>
      <td>there is no need to show this table info</td>
    
    </tr>';

        break;

    default:
        echo 'it works pretty fine!!!';
        break;
}
echo '</div></div>
<div class="col col-lg-2"></div>   ';


