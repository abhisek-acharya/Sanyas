<?=$header?>
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-pencil"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="">Admin Menu</a></li>
</ul>
<h4>Add Admin Menu</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel">
<?php echo validation_errors(); ?>
<form action="<?php echo base_url('myadmin/admin_menu/add_menu')?>" method="post"   class="form-bordered" >
<div class="form-group"> 
<label class="col-sm-3 control-label">Parent Id</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="parent_id" id="parent_id"   >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Menu Title</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="title" id="title"   required="">
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Controller Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="controller_name" id="controller_name"   >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Page Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="page_name" id="page_name"   >
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