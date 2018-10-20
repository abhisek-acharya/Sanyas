<div class="pull-right">

<?php /*?><div class="btn-group btn-group-list btn-group-notification">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-bell-o"></i>
<span class="badge">5</span>
</button>
<div class="dropdown-menu pull-right">
<a href="" class="link-right"><i class="fa fa-search"></i></a>
<h5>Notification</h5>
<ul class="media-list dropdown-list">
<li class="media">
<img class="img-circle pull-left noti-thumb" src="<?php echo base_url(); ?>admin/images/photos/user1.png" alt="">
<div class="media-body">
<strong>Nusja Nawancali</strong> likes a photo of you
<small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
</div>
</li>
<li class="media">
<img class="img-circle pull-left noti-thumb" src="<?php echo base_url(); ?>admin/images/photos/user2.png" alt="">
<div class="media-body">
<strong>Weno Carasbong</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
<small class="date"><i class="fa fa-calendar"></i> July 04, 2014</small>
</div>
</li>
<li class="media">
<img class="img-circle pull-left noti-thumb" src="<?php echo base_url(); ?>admin/images/photos/user3.png" alt="">
<div class="media-body">
<strong>Venro Leonga</strong> likes a photo of you
<small class="date"><i class="fa fa-thumbs-up"></i> July 03, 2014</small>
</div>
</li>
<li class="media">
<img class="img-circle pull-left noti-thumb" src="<?php echo base_url(); ?>admin/images/photos/user4.png" alt="">
<div class="media-body">
<strong>Nanterey Reslaba</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
<small class="date"><i class="fa fa-calendar"></i> July 03, 2014</small>
</div>
</li>
<li class="media">
<img class="img-circle pull-left noti-thumb" src="<?php echo base_url(); ?>admin/images/photos/user1.png" alt="">
<div class="media-body">
<strong>Nusja Nawancali</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
<small class="date"><i class="fa fa-calendar"></i> July 02, 2014</small>
</div>
</li>
</ul>
<div class="dropdown-footer text-center">
<a href="" class="link">See All Notifications</a>
</div>
</div><!-- dropdown-menu -->
</div><?php */?><!-- btn-group -->

<!-- btn-group -->

<div class="btn-group btn-group-option">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-caret-down"></i>
</button>
<ul class="dropdown-menu pull-right" role="menu">
<?php if($this->session->userdata('admin_id')==1){ ?>
<li><a href="<?php echo base_url("/myadmin/users");?>"><i class="glyphicon glyphicon-user"></i> Admin User List</a></li>
<li><a href="<?php echo base_url("/myadmin/admin_menu/admin_menu_setting/1");?>"><i class="glyphicon glyphicon-cog"></i> Admin Menu Settings</a></li>
<li><a href="<?php echo base_url("/myadmin/admin_menu");?>"><i class="glyphicon glyphicon-th-list"></i> Admin Menu</a></li>
<li class="divider"></li>
<?php } ?>
<li><a href="<?php echo base_url("/myadmin/users/reset_user_password");?>"><i class="glyphicon glyphicon-star"></i>Reset Password</a></li>
<li><a href="<?php echo base_url('/myadmin/logout');?>"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
</ul>
</div><!-- btn-group -->

</div>

