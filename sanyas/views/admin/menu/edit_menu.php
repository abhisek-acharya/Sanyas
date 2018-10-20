<?=$header?>
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-pencil"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="">Menu</a></li>
</ul>
<h4>Edit Menu</h4>
</div>
</div><!-- media -->
</div>
 <div class="contentpanel">
<?php echo validation_errors(); ?>

<form action="<?php echo base_url('myadmin/menu/edit_menu/'.$this->uri->segment(4))?>" method="post"  enctype="multipart/form-data"  class="form-bordered" >


<div class="form-group"> 
<label class="col-sm-3 control-label">Parent Id</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="parent_id" id="parent_id" value="<?php echo $row->parent_id?>"  required="" >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Title </label>
<div class="col-sm-6">
<input type="text" class="form-control" name="title" id="title" value="<?php echo $row->title?>"  required="required" >
<input type="hidden" name="added_by" id="added_by" value="<?php echo $row->added_by?>"   >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Np Title </label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="np_title" id="np_title" value="<?php echo $row->np_title?>" required="required"  >
</div>
</div>


<div class="form-group"> 
<label class="col-sm-3 control-label">Header Image</label>
<div class="col-sm-6">
<input type="file" name="feature_image" class="form-control" />
<input type="hidden" name="old_image" id="old_image" value="<?php echo $row->feature_image; ?>" />
</div>
<?php if($row->feature_image!=''){?>
<div class="col-sm-3">
<div class="row media-manager">
<div class="col-xs-6 col-sm-6 col-md-6 document" style="float:right">
<div class="thmb">
<div class="btn-group fm-group">
<button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
<span class="caret"></span>
</button>
<ul class="dropdown-menu fm-menu pull-right" role="menu">
<li><a  href="<?php echo base_url('myadmin/menu/delete_feature_image')."/".$row->id."/".$row->feature_image;?>" onclick="return confirm('Are you sure you want to delete  image!!');"><i class="fa fa-trash-o"></i> Delete</a></li>
</ul>
</div><!-- btn-group -->
<div class="thmb-prev">
<a href="<?php echo base_url(); ?>images/section/<?php echo $row->feature_image; ?>" data-rel="prettyPhoto">
<img src="<?php echo base_url(); ?>admin/js/timthumb/timthumb.php?src=<?php echo base_url(); ?>images/menu/<?php echo $row->feature_image; ?>&h=100&w=100&q=95" >
</a>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Page Type</label>
<div class="col-sm-6" >
<input type="radio" name="page_type"  value="1" <?php echo ($row->page_type=='1')?"checked":"";?>>&nbsp;&nbsp;Full Page&nbsp;&nbsp;
<input type="radio" name="page_type"  value="0" <?php echo ($row->page_type=='0')?"checked":"";?>>&nbsp;&nbsp;Page With Sidebar
</div>
</div>


<div class="form-group"> 
<label class="col-sm-3 control-label">URL Link</label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="url_link" id="url_link"   value="<?php echo $row->url_link?>" >
</div>
</div>


<div class="form-group"> 
<label class="col-sm-3 control-label">External URL Link</label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="external_url_link" id="external_url_link" value="<?php echo $row->external_url_link?>"  >
</div>
</div>


<div class="form-group"> 
<label class="col-sm-3 control-label">Detail</label>
<div class="col-sm-9" >
<textarea name="description" ><?php echo $row->description?></textarea>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Np Detail</label>
<div class="col-sm-9" >
<textarea name="np_description" ><?php echo $row->np_description?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Last Update:</label>
<div class="col-sm-3">
<div class="input-group">
 <?php echo date("M d Y, H:i:s", strtotime($row->last_update)); ?>
</div>
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
<button type="submit" name="btn_save" class="btn btn-primary mr5">Submit</button>
&nbsp;&nbsp;&nbsp;<button type="button" value="Cancel" class="btn btn-dark" onclick="history.go(-1);" />Cancel</button>
</div>
</div>

</form>
</div>
 
<?=$footer?>