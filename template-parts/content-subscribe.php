<div class="col-sm-12 sectionreplace">	

	<h2 class="">Subscribe</h2>

	<?php do_action ('process_customer_registration_form'); ?><!-- the hook to use to process the form -->

	<form class="form-horizontal user-forms" id="subscribeform" method="POST">
		<fieldset>					

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="user_name">Desired User Name</label>  
		  <div class="col-md-4">
		  <input id="user_name" name="user_name" placeholder="" class="form-control input-md" required="" type="text">		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="email">Email Address</label>  
		  <div class="col-md-4">
		  <input id="email" name="email" placeholder="" class="form-control input-md" required="" type="text">
		    
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="role">I am a</label>
		  <div class="col-md-4">
		    <select id="role" name="role" class="form-control">
		      <option value="artist">Artist</option>
		      <option value="organiser">Event Organiser</option>
		    </select>
		  </div>
		</div>

		<!-- Button -->
		<center>
			<div class="form-group">					  
			  <div class="col-md-12">
			    <input type="submit" id="addusersub" name="adduser" class="btn btn-primary" value="Register">
			    <?php wp_nonce_field( 'add-user', 'add-nonce' ) ?><!-- a little security to process on submission -->
			    <input name="action" type="hidden" id="action" value="adduser" />
			  </div>
			</div>
		</center>

		</fieldset>
	</form>
			
</div>




		

