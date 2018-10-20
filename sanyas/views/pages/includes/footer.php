<!--Main Footer-->
<footer class="main-footer">

<!--Footer Bottom-->
<div class="footer-bottom">

<!--Copyright Section-->
<div class="copyright-section">
<div class="auto-container">
<div class="row clearfix">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="copyright">&copy; 2017 Osho Tapoban. All rights reserved.</div>
</div>
</div>
</div>
</div>
</div>
</footer>
<!--End Main Footer-->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<!--End Scroll to top-->

<script src="<?php echo base_url(); ?>source/js/jquery.js"></script> 
<script src="<?php echo base_url(); ?>source/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>source/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url(); ?>source/js/jquery.fancybox-media.js"></script>
<script src="<?php echo base_url(); ?>source/js/script.js"></script>
<script src="<?php echo base_url(); ?>admin/js/jquery.datetimepicker.js"></script>
<script>
jQuery(function(){
jQuery('#date_timepicker_start').datetimepicker({
format:'Y-m-d',
onShow:function( ct ){
this.setOptions({
maxDate:jQuery('#date_timepicker_end').val()?jQuery('#date_timepicker_end').val():false
})
},
timepicker:false,
closeOnDateSelect:true
});

jQuery('#date_timepicker_end').datetimepicker({
format:'Y-m-d',
onShow:function( ct ){
this.setOptions({
minDate:jQuery('#date_timepicker_start').val()?jQuery('#date_timepicker_start').val():false
})
},
timepicker:false,
closeOnDateSelect:true	
});
});	
</script>
</body>
</html>