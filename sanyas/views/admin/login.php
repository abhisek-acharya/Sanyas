<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo base_url(); ?>admin/images/favicon.ico">
<title>Osho Tapoban: A Seekers home in the hills </title>
<link href="<?php echo base_url(); ?>admin/css/style.default.css" rel="stylesheet">
</head>
<body class="signin">
<section>
<div class="panel panel-signin">
<div class="panel-body">
<div class="logo text-center">
<img src="<?php echo base_url(); ?>admin/images/logo-primary.png" alt="Admin Logo"  >
</div>
<br />
<p class="text-center">Sign in to your account</p>
<div class="mb30"></div>
<form action="<?php echo base_url('/myadmin/admin/validate_myadmin'); ?>" method="post">
<div class="input-group mb15">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" name="username" placeholder="Username">
</div><!-- input-group -->
<div class="input-group mb15">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" name="password" placeholder="Password">
</div><!-- input-group -->
<div class="clearfix">
<div class="pull-left">
<div class="ckbox ckbox-primary mt10">
<?php if($this->session->flashdata('message')):?>
<p class="animate7 fadeIn"><a href="#"><span class="icon-question-sign icon-white" style="margin-right:10px;"></span><?php echo $this->session->flashdata('message');?>	</a></p>
<?php  endif?>
</div>
</div>
<div class="pull-right">
<button type="submit" class="btn btn-info">Sign In <i class="fa fa-angle-right ml5"></i></button>
</div>
</div>                      
</form>

</div><!-- panel-body -->
<!-- panel-footer -->
</div><!-- panel -->
</section>
<script src="<?php echo base_url(); ?>admin/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>admin/js/pace.min.js"></script>
</body>
</html>













