<?=$header?>
<script type="text/javascript">
function menuStatus(id)
	{ // alert(id);
	 if(document.getElementById("status"+id).checked==true)
	  {
		  
		 var act = "1"; 
		 //alert(act); 
		 
	  }
	  else
	  {
		var act = "0"; 
		//alert(act); 
	  }
	
   $.ajax({
   type: "POST",
   url: "<?php echo base_url('myadmin/menu/edit_status')?>",
   data: "id="+id+"&act="+act,
   success: function(msg){
   //alert( msg );
   }
 });

	}
	
	
</script>
<form action="<?php echo base_url("/myadmin/menu/change_order");?>" method="post">
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-list"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="">Menu</a></li>
</ul>
<h4>Menu List</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel"> 
<div class="panel-heading">
<a href="<?php echo base_url(); ?>myadmin/menu/add_menu"><span class="label label-default">Add Main Menu</span></a>
<a href="<?php echo base_url(); ?>myadmin/menu/add_menu/sub_menu"><span class="label label-primary">Add Sub Menu</span></a>
<a href="<?php echo base_url(); ?>myadmin/menu/add_menu/last_sub_menu"><span class="label label-success">Add Last Sub Menu</span></a>
</div>
<table  class="table table-striped table-bordered responsive" id="">
<thead>
<tr>
<th >Sn</th>
<th >Title</th>
<th >Added by</th>
<th style="width:70px;">Order</th>
<th >Status</th>
<th >Actions</th>
</tr>
</thead>
<tbody>
<?php $sn=1;?>
<?php foreach($menu as $row){?>
<tr >
<td><?php echo $sn;?></td>
<td><?php echo $row->title; ?></td>

<td>
<?php  
$addedby=$this->help_model->get_user_added_sel($row->added_by);
?>
<?php echo $addedby->admin_user_name; ?>
</td>
<td class="aligncenter">
<span class="center">
<input type="text" name="sort_order[<?PHP echo $row->id; ?>]" style="width:40px;" value="<?PHP echo $row->sort_order; ?>" >
</span>
    </td>
<td align="center" ><input type="checkbox" name="status<?php echo $row->id; ?>" id="status<?php echo $row->id; ?>" <?php echo ($row->status==1) ?"checked":""; ?> onclick="menuStatus(<?php echo $row->id; ?>);"  /></td>
<td colspan="2">
<a href="<?php echo base_url('myadmin/menu/edit_menu')."/".$row->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>

<?php if($this->session->userdata('admin_id')==1){ ?>
<a href="<?php echo base_url('myadmin/menu/delete_menu')."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } elseif($row->added_by==$this->session->userdata('admin_id')){?>
<a href="<?php echo base_url('myadmin/menu/delete_menu')."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } ?>

</td>
</tr>
<?php 
$snS=1;?>
<?php $sub_menu= $this->menu_model->get_menu_cat_sub_list($row->id);?>
<?php foreach($sub_menu as $row_sub_menu){?>
<tr>
<td>&nbsp;&nbsp;&nbsp;<?php echo $sn.".".$snS;?></td>
<td >&nbsp;&nbsp;&nbsp;<?php echo $row_sub_menu->title; ?></td>

<td>
<?php  
$addedbys=$this->help_model->get_user_added_sel($row_sub_menu->added_by);
?>
<?php echo $addedbys->admin_user_name; ?>
</td>
<td class="aligncenter">
<span class="center">
<input type="text" name="sort_order[<?PHP echo $row_sub_menu->id; ?>]" style="width:40px;" value="<?PHP echo $row_sub_menu->sort_order; ?>" >
</span>
    </td>
<td align="center" ><input type="checkbox" name="status<?php echo $row_sub_menu->id; ?>" id="status<?php echo $row_sub_menu->id; ?>" <?php echo ($row_sub_menu->status==1) ?"checked":""; ?> onclick="menuStatus(<?php echo $row_sub_menu->id; ?>);"  /></td>
<td>
<a href="<?php echo base_url('myadmin/menu/edit_menu')."/".$row_sub_menu->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>

<?php if($this->session->userdata('admin_id')==1){ ?>
<a href="<?php echo base_url('myadmin/menu/delete_menu')."/".$row_sub_menu->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } elseif($row_sub_menu->added_by==$this->session->userdata('admin_id')){?>
<a href="<?php echo base_url('myadmin/menu/delete_menu')."/".$row_sub_menu->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } ?>
</td>
</tr>
<?php 
$snSS=1;?>
<?php $last_sub_menu= $this->menu_model->get_menu_cat_sub_list($row_sub_menu->id);?>
<?php foreach($last_sub_menu as $row_last_sub_menu){?>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sn.".".$snS.".".$snSS;?></td>
<td >&nbsp;&nbsp;&nbsp;<?php echo $row_last_sub_menu->title; ?></td>

<td>
<?php  
$addedbyss=$this->help_model->get_user_added_sel($row_last_sub_menu->added_by);
?>
<?php echo $addedbyss->admin_user_name; ?>
</td>
<td class="aligncenter">
<span class="center">
<input type="text" name="sort_order[<?PHP echo $row_last_sub_menu->id; ?>]" style="width:40px;" value="<?PHP echo $row_last_sub_menu->sort_order; ?>" >
</span>
    </td>
<td align="center" ><input type="checkbox" name="status<?php echo $row_last_sub_menu->id; ?>" id="status<?php echo $row_last_sub_menu->id; ?>" <?php echo ($row_last_sub_menu->status==1) ?"checked":""; ?> onclick="menuStatus(<?php echo $row_last_sub_menu->id; ?>);"  /></td>
<td>
<a href="<?php echo base_url('myadmin/menu/edit_menu')."/".$row_last_sub_menu->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
<?php if($this->session->userdata('admin_id')==1){ ?>
<a href="<?php echo base_url('myadmin/menu/delete_menu')."/".$row_last_sub_menu->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } elseif($row_last_sub_menu->added_by==$this->session->userdata('admin_id')){?>
<a href="<?php echo base_url('myadmin/menu/delete_menu')."/".$row_last_sub_menu->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } ?>
</td>
</tr>
<?php $snSS++; } $snS++; } $sn++; } ?>
                                     
</tbody>
</table>
<div class="panel-heading">
<input type="submit" name="btn_save" value="update"  class="btn btn-primary" style="cursor:pointer;" title="Update"   />
</div>
</div>
</form>
<?=$footer?>