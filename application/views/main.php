<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/new.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/new.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
    <style>body { padding-top: 20px;background-color: #ecf0f1; }</style>

</head>
<!-- adding a pretty navbar for the site :)
 <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url();?>"><b>خانه</b></a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="navbar-collapse" id="navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
<!--            showing each table in the navbar-->
            <li><a href="<?php echo base_url(); ?>index.php/welcome/show/users"><b>کاربران</b></a></li>;
            <li><a href="<?php echo base_url(); ?>index.php/welcome/show/posts"><b>پست ها</b></a></li>;
            <li><a href="<?php echo base_url(); ?>index.php/welcome/show/post_cats"><b>دسته پست ها</b></a></li>;
            <li><a href="<?php echo base_url(); ?>index.php/welcome/show/main"><b>اسلاید ها</b></a></li>;
            <li><a href="<?php echo base_url(); ?>index.php/welcome/show/bugs"><b>باگ ها</b></a></li>;




</div><!-- /.navbar-collapse -->
</div><!-- /.container -->
</nav><!-- /.navbar -->
<!--adding fancy bottons-->
 </div>

<body>
<?php if (isset($main_view))$this->load->view($main_view);

?>

</body>
