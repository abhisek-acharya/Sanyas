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
<h4>Change Password</h4>
</div>
</div><!-- media -->
</div>
 <div class="contentpanel">
<?php echo validation_errors(); ?>
<form action="<?php echo base_url('myadmin/users/change_password/'.$this->uri->segment(4))?>" method="post" class="form-bordered" >
<div class="form-group"> 
<label class="col-sm-3 control-label">New Password</label>
<div class="col-sm-6">
<input type="text" name="password" id="password" class="form-control"    required="">
</div>
</div>
<div class="form-group"> 
<label class="col-sm-3 control-label">Confirm Password</label>
<div class="col-sm-6">
<input type="text" name="c_password" id="c_password" class="form-control"   required="" >
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