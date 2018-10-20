<?=$header?>
<script language="javascript">
function setSubMenu(id)
{
	//alert('msg');
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
<h4>Add Menu</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel">
<?php echo validation_errors(); ?>
<form action="<?php echo base_url('myadmin/menu/add_menu')?>" method="post" enctype="multipart/form-data"   class="form-bordered">
<?php if($this->uri->segment(4)=='sub_menu'){?>
<div class="form-group">
<label class="col-sm-3 control-label">Main Menu</label>
<div class="col-sm-9" >
<select name="parent_id" id="parent_id" onChange="setSubMenu(this.value);" class="chzn-select full" style="width:220px;height:30px;"> 
<option value="0" >----------</option> 
<?php foreach($menu_cat as $rows_cat):?>           
<option value="<?php echo $rows_cat->id ?>"><?php echo $rows_cat->title ?></option>
<?php  endforeach; ?> 
</select>
</div>
</div>
<?php } ?>
<?php if($this->uri->segment(4)=='last_sub_menu'){?>
<div class="form-group">
<label class="col-sm-3 control-label">Main Menu</label>
<div class="col-sm-9" >
<select name="parent_id" id="parent_id" onChange="setSubMenu(this.value);" class="chzn-select full" style="width:220px;height:30px;"> 
<option value="0" >----------</option> 
<?php foreach($menu_cat as $rows_cat):?>           
<option value="<?php echo $rows_cat->id ?>"><?php echo $rows_cat->title ?></option>
<?php $sn++; endforeach; ?> 
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Sub Menu</label>
<div class="col-sm-9" >
<select name="sub_menu" id="sub_menu" class="chzn-select full" style="width:220px;height:30px;">
<option value="">Choose Sub Menu</option>
</select>
</div>
</div>
<?php } ?> 




<div class="form-group"> 
<label class="col-sm-3 control-label">En Title </label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="title" id="title" required="required"  >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Np Title </label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="np_title" id="np_title" required="required"  >
</div>
</div>



<div class="form-group">
<label class="col-sm-3 control-label">Header Image</label>
<div class="col-sm-6" >
<input type="file" name="feature_image"  class="form-control"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Page Type</label>
<div class="col-sm-6" >
<input type="radio" name="page_type" checked value="1">&nbsp;&nbsp;Full Page&nbsp;&nbsp;
<input type="radio" name="page_type" value="0">&nbsp;&nbsp;Page With Sidebar
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">URL Link</label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="url_link" id="url_link"   >
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">External URL Link</label>
<div class="col-sm-6" >
<input type="text" class="form-control" name="external_url_link" id="external_url_link"   >
</div>
</div>



<div class="form-group"> 
<label class="col-sm-3 control-label">En Detail</label>
<div class="col-sm-9" >
<textarea name="description" ></textarea>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-3 control-label">Np Detail</label>
<div class="col-sm-9" >
<textarea name="np_description" ></textarea>
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