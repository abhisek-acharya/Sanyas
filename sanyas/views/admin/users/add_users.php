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
<h4>Add Users</h4>
</div>
</div><!-- media -->
</div>
 <div class="contentpanel">
<?php echo validation_errors(); ?>

<form action="<?php echo base_url('myadmin/users/add_users')?>" method="post" class="form-bordered"  enctype="multipart/form-data" >

<div class="form-group"> 
<label class="col-sm-3 control-label">Admin Type</label>
<div class="col-sm-6">
<select name="admin_type" id="industries_id"  data-placeholder="Choose One"  class="width300" required=""> 
<option value="">Choose One</option>            
<option value="1" >Super Admin</option>
<option value="2" >Manger Admin</option>
<option value="3" >Normal Admin</option>
</select>
</div>
</div>
<div class="form-group">
 <label class="col-sm-3 control-label">User Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="userName" id="userName"   required="">
</div>
</div>
<div class="form-group">
 <label class="col-sm-3 control-label">Password</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="password" id="password"   required="">
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Full Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="fullName" id="fullName"   >
</div>
</div>
<div class="form-group">
 <label class="col-sm-3 control-label">Email</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="email" id="email"   >
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Upload file</label>
<div class="col-sm-6" >
<input type="file" class="form-control" name="feature_image"  />
</div>
</div>
<div class="form-group">
 <label class="col-sm-3 control-label">Status</label>
<div class="col-sm-9" >
 <div class="ckbox ckbox-primary">
<input type="checkbox" id="status" name="status" value="1" />
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
