<?=$header?>
<script language="javascript">
function setSubMenu(id)
{
   $.ajax({
   type: "POST",
   url: "<?php echo base_url(); ?>myadmin/menu/get_sub_menu",
   data: "id="+id,
   success: function(msg){
	  $("#sub_menu").html(msg);
   }
		  });
}
</script>
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
<h4>Add Sub Menu</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel">
<?php echo validation_errors(); ?>
<form action="<?php echo base_url('myadmin/menu/add_sub_menu/'.$this->uri->segment(4))?>" method="post" enctype="multipart/form-data"  class="form-bordered" >

<div class="form-group"> 
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="title" id="title" >
<input type="hidden" name="parent_id" id="parent_id"  value="<?php echo $this->uri->segment(4)?>" required="" >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Detail</label>
<div class="col-sm-9" >
<textarea name="description" ></textarea>
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
<div class="col-sm-9">
<button type="submit" name="btn_save" class="btn btn-primary mr5">Submit</button>
&nbsp;&nbsp;&nbsp;<button type="button" value="Cancel" class="btn btn-dark" onclick="history.go(-1);" />Cancel</button>
</div>
</div>
</form>
</div>
<?=$footer?>