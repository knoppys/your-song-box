<!DOCTYPE html>
<html>
<head>
<title><?php bloginfo('name'); ?></title>
<meta name="viewport" content="initial-scale=1">
<meta name="author" content="Knoppys.co.uk" >
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">

<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
</head>
<body style="background:#f4f4f4">


<div class="header navbar-fixed-top">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 logo">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
			</div>
			<?php
			if (is_user_logged_in()) { ?>
				<div class="col-sm-2">
					<form id="search" class="header-search">
						<fieldset>
							<div class="input-group">
						      	<input name="s" type="text" class="form-control" placeholder="Search for...">
						      	<span class="input-group-btn">
						        	<button class="btn btn-secondary" type="button">Go!</button>
						      	</span>
						    </div>
						</fieldset>
					</form>
				</div>
			<?php } else { ?>
				<div class="col-sm-3 header-login pull-right">
					<?php
					$redirect_to = get_site_url();
					?>
					<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="POST">
								
					<div class="row">
						<div class="col-sm-6">
							<p><input class="form-control" placeholder="Username" id="user_login" type="text" size="20" value="" name="log"></p>
							<p><input class="form-control" placeholder="Password" id="user_pass" type="password" size="20" value="" name="pwd"></p>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
								<p>Remember me:  <input id="rememberme" type="checkbox" value="forever" name="rememberme"></p>
								<p><input class="form-control btn btn-primary" id="wp-submit" type="submit" value="Login" name="wp-submit"></p>
								<input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
								
							</div>
						</div>	
					</div>	
					</form>
				</div>
			<?php } ?>
		</div>
	</div>
</div>