<?php 
	require('scripts/sb_functions.php');
	$logged_in = logged_in( true, true );
	
	read_config();
	
	require('languages/' . $blog_config[ 'blog_language' ] . '/strings.php');
	sb_language( 'delete_static' );
	
	// Redirect
	function redirect_to_index( ) {
		$relative_url = 'index.php';
		if ( ( dirname($_SERVER['PHP_SELF']) == '\\' || dirname($_SERVER['PHP_SELF']) == '/' ) ) {
			// Hosted at root.
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.$relative_url);
		} else {
			// Hosted in sub-directory.
			header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$relative_url);
		}
	}
	
	if ( count( $_POST ) > 0 ) {
		echo("<pre>");
		print_r($_POST);
		echo("</pre>");
	}
		
	// "CGI" Functions
	if ( array_key_exists( "no", $_POST ) || array_key_exists( "yes", $_POST ) ) {
		if ( array_key_exists( "no", $_POST ) ) {
			// User clicked the "Cancel" button
			redirect_to_index();
		} else {
			if ( array_key_exists( "yes", $_POST ) ) {
				$entry = $_POST['entry'];
				$path = 'content/static/';
				if ( file_exists( $path . $entry . '.txt' ) ) {
					$ok = sb_delete_file( $path . $entry . '.txt' );
				}
				if ( file_exists( $path . $entry . '.txt.gz' ) ) {
					$ok = sb_delete_file( $path . $entry . '.txt.gz' );
				}
			
				if ( $ok === true ) {
					modify_link( 'delete_static', 'static.php?page='.$_POST['entry'] );
					
					redirect_to_index();
				}
			}
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
		global $lang_string, $user_colors;
		
		if ( array_key_exists( "no", $_POST ) || array_key_exists( "yes", $_POST ) ) {
			// Check to see if we're posting data...
			global $ok;
			if ( $ok !== true ) {
				echo( $lang_string['error'] . $ok . '<p />' );
			}
			echo( '<a href="index.php">' . $lang_string['home'] . '</a><br /><br />' );
		} else {
			?>
			
			<h2><?php echo( $lang_string['title'] ); ?></h2>
			<?php echo( $lang_string['instructions'] ); ?><p />
			
			<hr noshade size="1" color=#<?php echo( $user_colors['inner_border_color'] ); ?>>
	
			<?php
				$blog_content = get_static_entry_by_file( $_GET['entry'] );
				echo( $blog_content );
			?>
			
			<hr noshade size="1" color=#<?php echo( $user_colors['inner_border_color'] ); ?>>
			
			<form action='delete_static.php' method="POST">
				<input type="hidden" name="entry" value="<?php echo( $_GET['entry'] ); ?>">
				<input type="submit" name="yes" value="<?php echo( $lang_string['ok_btn'] ); ?>" />
				<input type="submit" name="no" value="<?php echo( $lang_string['cancel_btn'] ); ?>" />
			</form>
			
			<?php 
		}
	}
?>
<?php 
	theme_pagelayout();
?>
</html>
