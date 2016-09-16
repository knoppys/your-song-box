

/********************
// Ajax function for the default location serch query
********************/	

jQuery(document).ready(function(){

	

	jQuery('.registrationform input').addClass('form-control');

	jQuery('.uploadi span').click(function(){
		jQuery('.uploadform').slideToggle();
	});

	jQuery('#signup').on('click', function(){
		jQuery('.welcome').hide();
		jQuery('.signup').fadeIn();
	});	
	
	jQuery('#profiletabs a').click(function (e) {
		e.preventDefault()
		jQuery(this).tab('show')
	})

	jQuery('.applynowsubmit').on('click', function(){

		var data = jQuery('#applynowform').serialize();

		jQuery(function(){
		    jQuery.ajax({
	            url:"http://knoppysdev.com/ysb/wp-admin/admin-ajax.php",
	            type:'POST',
	            data:'action=applyeventajax=' + data,
	            dataType:'json',
	            success:function(data){	            	
	            	//jQuery(this).text('Applied');
	            alert('Your message has been sent.');
	            	
			    }
			});
		});
	})

	jQuery('#addtrack').on('click', function(){

		var tracktitle = jQuery('#tracktitle').val();
		var trackinformation = jQuery('textarea[name=\'trackinformation\']').val();
		var tracksource = jQuery('#tracksource').val();
		var trackcover = jQuery('#trackcover').val();
		var genre = jQuery('#cat').val();
		console.log(genre);
		jQuery(function(){
		    jQuery.ajax({
	            url:siteUrlobject.siteUrl+'/wp-admin/admin-ajax.php',
	            type:'POST',
	            data:'action=addmusicajax&tracktitle=' + tracktitle + '&trackinformation=' + trackinformation + '&tracksource=' + tracksource + '&trackcover=' + trackcover + '&genre=' + genre,
	            dataType:'json',
	            success:function(data){	          	
	            console.log(data);

			    }
			});
		});
		
		
	})
	

});

jQuery(document).ready(function(){ 
    jQuery('.upload_image_button').click(function(){ 
    var textfieldid = jQuery(this).prev().attr("id"); 
    wp.media.editor.send.attachment = function(props, attachment){jQuery('#' + textfieldid).val(attachment.url);}
    wp.media.editor.open(this);
    return false;         
  });   
});


jQuery(document).ready(function(){
	jQuery('.addnew').on('click', function(){
		jQuery('.form-dropdown').slideToggle();
		var addnew = jQuery('.addnew').text();
		console.log(addnew);
		if (addnew == 'Add a new Track  ') {
			jQuery('.addnew').html('Cancel');			
		} else if (addnew == 'Cancel') {
			jQuery('.addnew').html('Add a new Track  ');			
		}
	})
})