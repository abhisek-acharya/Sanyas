<div class="media profile-left">
<?php if($this->session->userdata('admin_id')!=''){?>
<?php  $user_info=$this->help_model->get_help_user_sel($this->session->userdata('admin_id'));?>
<?php if($user_info->feature_image!=''){?>
<a class="pull-left profile-thumb" href="<?php echo base_url(); ?>images/users/<?php echo $user_info->feature_image; ?>" data-rel="prettyPhoto">
<img class="img-circle" src="<?php echo base_url(); ?>admin/js/timthumb/timthumb.php?src=<?php echo base_url(); ?>images/users/<?php echo $user_info->feature_image; ?>&h=50&w=50&q=95" >
</a>
<?php } else { ?>
<a class="pull-left profile-thumb"  >
<img class="img-circle" src="<?php echo base_url(); ?>admin/js/timthumb/timthumb.php?src=<?php echo base_url(); ?>admin/images/photos/user1.png&h=50&w=50&q=95" alt="...">
</a>
<?php }  ?>
<?php }  ?>
<div class="media-body">
<h4 class="media-heading">Hi, <?php echo $this->session->userdata('admin_user_name') ?></h4>
<small class="text-muted"><?php echo date("F d, Y"); ?></small>
</div>
</div>
<ul class="nav nav-pills nav-stacked">
<li class="<?php if($this->uri->segment(2)==''){?>active<?php } ?>"><a href="<?php echo base_url("/myadmin");?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
<?php
$log_in_admin_id = $this->session->userdata('admin_id');
$pid="0";
$admin_left_menu= $this->help_model->get_admin_left_menu($log_in_admin_id);
foreach ($admin_left_menu as $row_menu){
$menu_id=$row_menu->id;

$row_pid=$this->help_model->get_admin_menu_sel($this->uri->segment(2));
$pid=isset($row_pid->parent_id)? $row_pid->parent_id: '';
if($pid==0){
$aid=isset($row_pid->id)? $row_pid->id: '';
}else{
$aid=isset($pid)? $pid: '';
}	

?>
<li class="parent <?php if($aid==$menu_id){?>active<?php } ?>"><a href=""><i class="fa fa-bars"></i> <span><?php echo $row_menu->title; ?></span></a>
<ul class="children" >
<?Php
$admin_left_sub_menu= $this->help_model->get_admin_left_sub_menu($menu_id,$log_in_admin_id);
foreach ($admin_left_sub_menu as $row_sub_menu){
$cname=	$this->uri->segment(2);
if($this->uri->segment(4)!=''){
$pname=	$this->uri->segment(3).'/'.$this->uri->segment(4);
}else{
$pname=	$this->uri->segment(3);
}
?>
<li class="<?php if($cname==$row_sub_menu->controller_name&&$pname==$row_sub_menu->page_name){?>active<?php } ?>"><a href="<?php echo base_url("/myadmin/$row_sub_menu->controller_name/$row_sub_menu->page_name");?>"  ><?php echo $row_sub_menu->title; ?></a></li>
<?php } ?>
</ul>
</li>
 <?php  } ?>
</ul>