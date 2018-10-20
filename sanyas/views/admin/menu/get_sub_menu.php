<option value="">Choose Sub Menu</option>
<?php 
$id =  $_POST['id'];
$sub_menu_list= $this->help_model->get_sub_menu_list($id);
foreach($sub_menu_list as $row_sub_menu):?>           
<option value="<?php echo $row_sub_menu->id;  ?>" ><?php echo $row_sub_menu->title;  ?></option>
<?php  endforeach; ?> 	   
