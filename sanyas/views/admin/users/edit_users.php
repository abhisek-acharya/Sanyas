<?=$header?>
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-pencil"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="">Admin User</a></li>
</ul>
<h4>Edit Users</h4>
</div>
</div><!-- media -->
</div>
 <div class="contentpanel">
<?php echo validation_errors(); ?>

<form action="<?php echo base_url('myadmin/users/edit_users/'.$this->uri->segment(4))?>" method="post"   class="form-bordered" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-3 control-label">Admin Type</label>
<div class="col-sm-9">
<select name="admin_type" id="industries_id"  data-placeholder="Choose One"  class="width300" required=""> 
<option value="">Choose One</option>            
<option value="1" <?php echo ($row->admin_type==1) ? "selected":""; ?>>Super Admin</option>
<option value="2" <?php echo ($row->admin_type==2) ? "selected":""; ?>>Manger Admin</option>
<option value="3" <?php echo ($row->admin_type==3) ? "selected":""; ?>>Normal Admin</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">User Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="userName" id="userName" value="<?php echo $row->admin_user_name?>"   required="">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Full Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="fullName" id="fullName" value="<?php echo $row->admin_full_name; ?>"  required="" >
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="email" id="email" value="<?php echo $row->admin_email; ?>"   >
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Upload file</label>
<div class="col-sm-6">
<input type="file" class="form-control" name="feature_image"/>
</div>
<div class="col-sm-3">
<input type="hidden" name="old_image" id="old_image" value="<?php echo $row->feature_image; ?>" />
<?php if($row->feature_image!=''){?>
<a href="<?php echo base_url(); ?>images/users/<?php echo $row->feature_image; ?>" data-rel="prettyPhoto">
<img src="<?php echo base_url(); ?>admin/js/timthumb/timthumb.php?src=<?php echo base_url(); ?>images/users/<?php echo $row->feature_image; ?>&h=100&q=95" style="float:right;" class="media-object thumbnail">
</a>
<?php } ?>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Status</label>
<div class="col-sm-9">
<div class="ckbox ckbox-primary">
<input type="checkbox" name="status" id="status" value="1" <?php echo ($row->status=='1')?"checked":"";?> />
<label for="status">&nbsp;</label>
</div>
</div>
</div>

<div class="form-group">
 <label class="col-sm-3 control-label" >Save and return here</label>
<div class="col-sm-9">
<div class="ckbox ckbox-primary">
<input type="checkbox"  id="sr" name="again" value="1"  id="on_off_on"/>
<label for="sr">&nbsp;</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-sm-9">
<button type="submit" name="btn_save" class="btn btn-dark mr5">Submit</button>
&nbsp;&nbsp;&nbsp;<button type="button" value="Cancel" class="btn btn-default" onclick="history.go(-1);" />Cancel</button>
</div>
</div>
</form>
</div>
 
<?=$footer?>