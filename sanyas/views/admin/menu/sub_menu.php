<?=$header?>
<script type="text/javascript">
function subMenuStatus(id)
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
<form action="<?php echo base_url("/myadmin/menu/change_order_sub_menu/{$this->uri->segment(4)}");?>" method="post">
<div class="pageheader">
<div class="media">
<div class="pageicon pull-left">
<a href="<?php echo base_url("/myadmin/menu/add_sub_menu")."/".$this->uri->segment(4);?>"><i class="fa fa-plus-square"></i></a>
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
<table  class="table table-striped table-bordered responsive" id="basicTable">
<thead>
<tr>
<th >Sn</th>
<th >Title</th>
<th style="width:70px;">Order</th>
<th >Added by</th>
<th >Ip address</th>
<th >Status</th>
<th >Actions</th>
</tr>
</thead>
<tbody>
<?php $sn=1;?>
<?php foreach($sub_menu as $row){?>
<tr >
<td><?php echo $sn;?></td>
<td><?php echo $row->title; ?></td>
<td class="aligncenter">
<span class="center">
<input type="text" name="sort_order[<?PHP echo $row->id; ?>]" style="width:40px;" value="<?PHP echo $row->sort_order; ?>" >
</span>
    </td>
<td>
<?php  
$addedby=$this->help_model->get_user_added_sel($row->added_by);
?>
<?php echo $addedby->admin_user_name; ?>
</td>
<td><?php echo $row->remote_ip_address; ?></td>

<td align="center" ><input type="checkbox" name="status<?php echo $row->id; ?>" id="status<?php echo $row->id; ?>" <?php echo ($row->status==1) ?"checked":""; ?> onclick="subMenuStatus(<?php echo $row->id; ?>);"  /></td>
<td colspan="2">
<a href="<?php echo base_url('myadmin/menu/edit_sub_menu')."/".$this->uri->segment(4)."/".$row->id;?>" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
<?php if($this->session->userdata('admin_id')==1){ ?>
<a href="<?php echo base_url('myadmin/menu/delete_sub_menu')."/".$this->uri->segment(4)."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php } elseif($row->added_by==$this->session->userdata('admin_id')){?>
<a href="<?php echo base_url('myadmin/menu/delete_sub_menu')."/".$this->uri->segment(4)."/".$row->id;?>" onclick="return confirm('Are you sure you want to delete this row!!');" class="btn btn-white btn-sm tooltips" data-toggle="