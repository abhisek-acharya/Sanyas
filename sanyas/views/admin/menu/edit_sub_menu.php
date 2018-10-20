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

<form action="<?php echo base_url('myadmin/menu/edit_sub_menu/'.$this->uri->segment(4).'/'.$this->uri->segment(5))?>" method="post"  enctype="multipart/form-data"  class="form-bordered" >
<div class="form-group"> 
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="title" id="title" value="<?php echo $row->title?>" >
<input type="hidden" name="added_by" id="added_by" value="<?php echo $row->added_by?>" >
<input type="hidden" name="parent_id" id="parent_id"  value="<?php echo $row->parent_id?>" required="" >
</div>
</div>



<div class="form-group">
<label class="col-sm-3 control-label">Detail</label>
<div class="col-sm-9">
<textarea name="description" ><?PHP echo $row->description; ?></textarea>
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