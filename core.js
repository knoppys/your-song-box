
// Slick slider to get things sliding. 

    //un comment below here
    //jQuery(document).ready(function(){
      //  jQuery('.single-item').slick();
    //})

/********************
// Ajax add music
********************/



/********************

jQuery(document).ready(function(){
	jQuery('#createreseller').click(function(){
		var siteUrl = siteUrlobject.siteUrl+'/wp-admin/admin-ajax.php';
		var addondomain = jQuery('#resellerp_pageurl').val();
		var email = jQuery('#resllerp_email').val(); 	


		jQuery(function(){
		    jQuery.ajax({
	            url:siteUrl,
	            type:'POST',
	            data:'action=addondomain&addondomain='+addondomain+'&email='+jQuery('#resellerp_email').val(),
	            success:function(result){
	            //got it done now let them know the result	            
	            jQuery('#scphs #addhere2').html('<i class="fa fa-check-circle"></i>');
				jQuery('#scphs input').val('<i class="fa fa-check-circle"></i>');
			    console.log()		
	            }
			});		
		});
	});
});
********************/