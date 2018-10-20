<?=$header?>
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-home"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
<!--<li><a href="">Tables</a></li>
<li>Data Tables</li>-->
</ul>
<h4>Dashboard</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel">
<div class="row row-stat">
<div class="col-md-4">
<div class="panel panel-primary noborder">
<div class="panel-heading noborder">
<div class="panel-btns">
<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
</div><!-- panel-btns -->
<div class="panel-icon"><i class="fa fa-users"></i></div>
<div class="media-body">
<?php  $user_info=$this->users_model->get_user_sel($this->session->userdata('admin_id'));?>
<h5 class="md-title nomargin">Last Logout</h5>
<h3 class="mt5"><?php echo $user_info->logout_time?></h3>
</div><!-- media-body -->
<hr>
<div class="clearfix mt20">
<div class="pull-left">
<h5 class="md-title nomargin">No of time Login </h5>
<h4 class="nomargin"><?php echo $user_info->no_of_time_login?></h4>
</div>
<div class="pull-right">
<h5 class="md-title nomargin">Login Time</h5>
<h4 class="nomargin"><?php echo $user_info->login_time?></h4>
</div>
</div>

</div><!-- panel-body -->
</div><!-- panel -->
</div>

</div>
<?=$footer?>