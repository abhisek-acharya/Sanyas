<div class="col-md-7">
<article class="blog-content">
<?php if($row->feature_image!=''){?>
<div class="entry-image">
<img alt="<?php echo $row->title?>" src="<?php echo base_url(); ?>admin/js/timthumb/timthumb.php?src=<?php echo base_url(); ?>images/section/<?php echo $row->feature_image; ?>&h=311&w=847&q=95">
</div>
<?php } ?>
<div class="entry-content">
<?php echo $row->description?>
</article>


</div>
<!--// col md 9-->

<!--Blog Sidebar-->
<div class="col-md-5">

<div class="sidebar">

<!-- 
Location Map
====================================== -->

<div class="g-maps" id="venue">

<!-- Tip:  You can change location, zoom, color theme, height, image and Info text by changing data-* attribute below. -->
<!-- Available Colors:    red, orange, yellow, green, mint, aqua, blue, purple, pink, white, grey, black, invert -->

<div class="map" id="map_canvas" data-maplat="<?php echo $row->url_link?>" data-maplon="<?php echo $row->fa_icon?>" data-mapzoom="16" data-color="" data-height="800" data-img="<?php echo base_url(); ?>source/images/marker.png" data-info="<?php echo $row->title?>"></div>

</div>
<!-- end div.g-maps -->

</div>

</div>
