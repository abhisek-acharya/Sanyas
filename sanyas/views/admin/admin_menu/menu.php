<?=$header?>
<script type="text/javascript">
function menu_status(id)
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
   url: "<?php echo base_url('myadmin/admin_menu/edit_status')?>",
   data: "id="+id+"&act="+act,
   success: function(msg){
   //alert( msg );
   }
 });

	}
	
</script>
<form action="<?php echo base_url("/myadmin/admin_menu/change_order");?>" method="post">
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<i class="fa fa-list"></i>
</div>
<div class="media-body">
<ul class="breadcrumb">
<li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
<li><a href="#">Admin Menu</a></li>
</ul>
<h4>Admin Menu List</h4>
</div>
</div><!-- media -->
</div>
<div class="contentpanel"> 
<div class="row">
<div class="col-sm-4">
<div class="btn-list">
<a href="<?php echo base_url("/myadmin/admin_menu/add_menu");?>" class="btn btn-dark">Add New Menu</a>
<input type="submit" name="btn_save" value="Update Order"  class="btn btn-default" style="cursor:pointer;" title="Update Order"   />
</div>
<!-- list-group -->
                                
</div>
</div>
<table class="table table-bordered " id="basicTable">
<thead>
<tr>
<th >Sn</th>
<th >Menu Title</th>
<th style="width:70px;">Order</th>
<th >Status</th>
<th >Actions</th>
</tr>
</thead>
<tbody>
<?php $sn=1;?>
<?php foreach($menu as $row):?>
<tr >
<td><?php echo $sn;?></td>
<td><?php echo $row->title; ?></td>
<td class="aligncenter">
<input type="text" class="form-control btn-sm" name="sort_order[<?PHP echo $row->id; ?>]" style="width:40px;" value="<?PHP echo $row->sort_order; ?>" >
</td>
<td align="center" ><input type="checkbox" name="status<?php echo $row->id; ?>" id="status<?php echo $row->id; ?>" <?php echo ($row->status==1) ?"checked":""; ?> onclick="menu_status(<?php echo $row->id; ?>);"  /></td>
<td>
<a href="<?php echo base_url('myadmin/admin_menu/edit_menu')."/".$row->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
<a href="<?php echo base_url('myadmin/admin_menu/delete_menu')."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
</td>
</tr>
<?php $sn++; endforeach; ?>                                       
</tbody>
</table>
</div> 
</form>
<?=$footer?>
