<?php 
	require('scripts/sb_functions.php');
	$logged_in = logged_in( true, true );
	
	read_config();
	
	require('languages/' . $blog_config[ 'blog_language' ] . '/strings.php');
	sb_language( 'themes' );
	
	// Post
	if ( array_key_exists( "blog_theme", $_POST ) ) {
		$ok = write_theme( stripslashes( $_POST['blog_theme'] ) );
		
		if ( $ok === true ) {
			$relative_url = 'index.php';
			if ( ( dirname($_SERVER['PHP_SELF']) == '\\' || dirname($_SERVER['PHP_SELF']) == '/' ) ) {
				// Hosted at root.
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.$relative_url);
			} else {
				// Hosted in sub-directory.
				header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$relative_url);
			}
			
			exit;
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=<?php echo( $lang_string['html_charset'] ); ?>'>
	<link rel=stylesheet type="text/css" href="themes/<?php echo( $blog_theme ); ?>/style.css">
	<?php require('themes/' . $blog_theme . '/user_style.php'); ?>
	<script language="JavaScript" src="scripts/sb_javascript.js"></script>
	<title><?php echo($blog_config[ 'blog_title' ]); ?> - <?php echo( $lang_string['title'] ); ?></title>
</head>
<?php 
	function page_content() {
		global $lang_string, $user_colors, $blog_theme;
		
		if ( array_key_exists( "blog_theme", $_POST ) ) {
			// Check to see if we're posting data...
			global $ok;
			if ( $ok !== true ) {
				echo( $lang_string['error'] . $ok . '<p />' );
			}
			echo( '<a href="index.php">' . $lang_string['home'] . '</a><br /><br />' );
		} else {
			// Display theme selection page
			?>
			<h2><?php echo( $lang_string['title'] ); ?></h2>
			<?php echo( $lang_string['instructions'] ); ?><p />
			
			<hr noshade size="1" color=#<?php echo( $user_colors['inner_border_color'] ); ?>>
			
			<form action="themes.php" method="POST" name="setup" name="setup">
				
				<label for="blog_theme"><?php echo( $lang_string['choose_theme'] ); ?></label><br />
				<select name="blog_theme">
					<?php
						$dir = 'themes/';
						
						clearstatcache();
						if ( is_dir($dir) ) {
							$dhandle = opendir($dir);
							if ( $dhandle ) {
								$sub_dir = readdir( $dhandle );
								while ( $sub_dir ) {
									if ( is_dir( $dir . $sub_dir . '/' ) == true && $sub_dir != '.' && $sub_dir != '..' ) {
										$lang_dir = $sub_dir;
										$lang_name = sb_read_file( $dir . $sub_dir . '/id.txt' );
										if ( $lang_name ) {
											$str = '<option label="' . $lang_name . '" value="' . $lang_dir . '"';
											if ( $blog_theme == $lang_dir ) {
												$str = $str . ' selected';
											}
											$str = $str . '>' . $lang_name . '</option>';
											
											echo( $str );
										}
									}
									$sub_dir = readdir( $dhandle );
								}
							}
							closedir( $dhandle );
						}
					?>
				</select><br />
				
				<hr noshade size="1" color=#<?php echo( $user_colors['inner_border_color'] ); ?>>
				
				<input type="submit" name="submit" value="<?php echo( $lang_string['submit_btn'] ); ?>" /><br /><br />
			</form>
			
			<?php 
		}
	}
?>
<?php 
	theme_pagelayout();
?>

</html>
