</div><!-- mainpanel -->
</div><!-- mainwrapper -->
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>admin/js/jquery.nepaliDatePicker.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".bod-picker").nepaliDatePicker({
            dateFormat: "%D, %M %d, %y",
            closeOnDateSelect: true,
			
            //minDate : "सोम, जेठ १०, २०७३",
            //maxDate : "मंगल, जेठ ३२, २०७३"
        });

        $(".bod-picker").on("monthChange", function (event) {
            console.log(event);
        });

        $(".bod-picker").on("yearChange", function (event) {
            console.log(event);
        });
        $(".bod-picker").on("select", function (event) {
            console.log(event);
        });
        $(".bod-picker").on("dateChange", function (event) {
            console.log(event);
        });

    });
</script>
<script src="<?php echo base_url(); ?>admin/js/jquery.datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>admin/js/colorpicker.js"></script>
<script src="<?php echo base_url(); ?>admin/js/spectrum.js"></script>
<script>
            
			jQuery(document).ready(function(){
				
				jQuery('.thmb').hover(function() {
                    var t = jQuery(this);
                    t.find('.ckbox').show();
                    t.find('.fm-group').show();
                }, function() {
      
                    var t = jQuery(this);
                    if(!t.closest('.thmb').hasClass('checked')) {
                        t.find('.ckbox').hide();
                        t.find('.fm-group').hide();
                    }
                });
    
                jQuery('.ckbox').each(function(){
                    var t = jQuery(this);
                    var parent = t.parent();
                    if(t.find('input').is(':checked')) {
                        t.show();
                        parent.find('.fm-group').show();
                        parent.addClass('checked');
                    }
                });
				
				 // Select2
                jQuery("#select-basic, #select-multi").select2();
                jQuery('#select-search-hide').select2({
                    minimumResultsForSearch: -1
                });
                
                function format(item) {
                    return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                }
                
                // This will empty first option in select to enable placeholder
                jQuery('select option:first-child').text('');
                
                jQuery("#locatioan_id").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
				
				jQuery("#industries_id").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
				
				jQuery("#sub_category").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
                
    			//jQuery('#genderError').attr('for','gender');
				jQuery('#typetError').attr('for','type_id[]');
				jQuery('#catError').attr('for','category_id[]');
                jQuery('#eduError').attr('for','education_id[]');
    
                jQuery('.ckbox').click(function(){
                    var t = jQuery(this);
                    if(!t.find('input').is(':checked')) {
                        t.closest('.thmb').removeClass('checked');
                        enable_itemopt(false);
                    } else {
                        t.closest('.thmb').addClass('checked');
                        enable_itemopt(true);
                    }
                });
    
                jQuery('#selectAll').click(function() {
                    if(jQuery(this).hasClass('btn-default')) {
                        jQuery('.thmb').each(function() {
                            jQuery(this).find('input').attr('checked',true);
                            jQuery(this).addClass('checked');
                            jQuery(this).find('.ckbox, .fm-group').show();
                        });
                        enable_itemopt(true);
                        jQuery(this).removeClass('btn-default').addClass('btn-primary');
                        jQuery(this).text('Select None');
                    } else {
                        jQuery('.thmb').each(function(){
                            jQuery(this).find('input').attr('checked',false);
                            jQuery(this).removeClass('checked');
                            jQuery(this).find('.ckbox, .fm-group').hide();
                        });
                        enable_itemopt(false);
                        jQuery(this).removeClass('btn-primary').addClass('btn-default');
                        jQuery(this).text('Select All');
                    }
                });
    
                function enable_itemopt(enable) {
                    if(enable) {
                        jQuery('.media-options .btn.disabled').removeClass('disabled').addClass('enabled');
                    } else {
        
                        // check all thumbs if no remaining checks
                        // before we can disabled the options
                        var ch = false;
                        jQuery('.thmb').each(function(){
                            if(jQuery(this).hasClass('checked'))
                                ch = true;
                        });
        
                        if(!ch)
                            jQuery('.media-options .btn.enabled').removeClass('enabled').addClass('disabled');
                    }
                }
				
                jQuery("a[data-rel^='prettyPhoto']").prettyPhoto();
                jQuery('#basicTable').DataTable({
                    responsive: true
                });
                
                var shTable = jQuery('#shTable').DataTable({
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                    },
                    responsive: true
                });
                
                // Show/Hide Columns Dropdown
                jQuery('#shCol').click(function(event){
                    event.stopPropagation();
                });
                
                jQuery('#shCol input').on('click', function() {

                    // Get the column API object
                    var column = shTable.column($(this).val());
 
                    // Toggle the visibility
                    if ($(this).is(':checked'))
                        column.visible(true);
                    else
                        column.visible(false);
                });
                
               
                
                // Add event listener for opening and closing details
                jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = exRowTable.row( tr );
             
                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                });
               
                
                // DataTables Length to Select2
                jQuery('div.dataTables_length select').removeClass('form-control input-sm');
                jQuery('div.dataTables_length select').css({width: '60px'});
                jQuery('div.dataTables_length select').select2({
                    minimumResultsForSearch: -1
                });

// Select2
                jQuery('.selections').select2({
                    minimumResultsForSearch: -1
                }); // Wizard With Disabled Tab Click
                jQuery('#tabWizard').bootstrapWizard({
                    onTabShow: function(tab, navigation, index) {
                        tab.prevAll().addClass('done');
                        tab.nextAll().removeClass('done');
                        tab.removeClass('done');
                        
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        
                        if($current >= $total) {
                            $('#tabWizard').find('.wizard .next').addClass('hide');
                            $('#tabWizard').find('.wizard .finish').removeClass('hide');
                        } else {
                            $('#tabWizard').find('.wizard .next').removeClass('hide');
                            $('#tabWizard').find('.wizard .finish').addClass('hide');
                        }
                    },
                    onTabClick: function(tab, navigation, index) {
                        return false;
                    }
                });


                
                // Wizard With Form Validation
                jQuery('#valWizard').bootstrapWizard({
                    onTabShow: function(tab, navigation, index) {
                        tab.prevAll().addClass('done');
                        tab.nextAll().removeClass('done');
                        tab.removeClass('done');
                        
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        
                        if($current >= $total) {
                            $('#valWizard').find('.wizard .next').addClass('hide');
                            $('#valWizard').find('.wizard .finish').removeClass('hide');
                        } else {
                            $('#valWizard').find('.wizard .next').removeClass('hide');
                            $('#valWizard').find('.wizard .finish').addClass('hide');
                        }
						var $percent = ($current/$total) * 100;
                        $('#valWizard').find('.progress-bar').css('width', $percent+'%');
                    },
                    onTabClick: function(tab, navigation, index) {
                        return false;
                    },
                    onNext: function(tab, navigation, index) {
                        var $valid = jQuery('#valWizard').valid();
                        if (!$valid) {
                            $validator.focusInvalid();
                            return false;
                        }
                    }
                });
                
                // Wizard With Form Validation
                var $validator = jQuery("#valWizard").validate({
                    highlight: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    success: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-error');
                    }
                });
                
                
                // This will submit the basicWizard form
                jQuery('.panel-wizard').submit(function() {    
                    //alert('This will submit the form wizard');
                   // return false // remove this to submit to specified action url
                });
		<?php if($this->uri->segment(3)!='page'&&$this->uri->segment(2)=='packages'&&$this->uri->segment(3)!='sub_packages'&&$this->uri->segment(2)!='activities'){?>
				// This will empty first option in select to enable placeholder
                jQuery('select option:first-child').text('');
                
                // Select2
                jQuery("select").select2({
                    minimumResultsForSearch: ''
                });
				<?php } ?>
				
				
				
				
    
            });
 $("#triggerSet").spectrum({
    preferredFormat: "hex",
});  

$("#triggerSet").show();  

$("#atriggerSet").spectrum({
    preferredFormat: "hex",
});  

$("#atriggerSet").show(); 

$("#btriggerSet").spectrum({
    preferredFormat: "rgb",
	 showAlpha: true,
});  

$("#btriggerSet").show();            
           
        </script>

<script>
 jQuery(document).ready(function(){
                                    
        //Replaces data-rel attribute to rel.
        //We use data-rel because of w3c validation issue
        jQuery('a[data-rel]').each(function() {
            jQuery(this).attr('rel', jQuery(this).data('rel'));
        });
    });

/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	defaultDate:'8.12.1986', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

jQuery('#datepicker_sd').datetimepicker({
	timepicker:false,
	format:'Y-m-d',
});	

$('#datetimepicker11').datetimepicker({

	beforeShowDay: function(date) {
	
		return [true, ""];
	},
closeOnDateSelect:true
});

  // Color Picker
                if(jQuery('#colorpicker').length > 0) {
                    jQuery('#colorSelector').ColorPicker({
			onShow: function (colpkr) {
			    jQuery(colpkr).fadeIn(500);
                            return false;
			},
			onHide: function (colpkr) {
                            jQuery(colpkr).fadeOut(500);
                            return false;
			},
			onChange: function (hsb, hex, rgb) {
			    jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
			    jQuery('#colorpicker').val('#'+hex);
			}
                    });
                }
  
                // Color Picker Flat Mode
                jQuery('#colorpickerholder').ColorPicker({
                    flat: true,
                    onChange: function (hsb, hex, rgb) {
			jQuery('#colorpicker3').val('#'+hex);
                    }
                });
                


                


</script>
</body>
</html>

