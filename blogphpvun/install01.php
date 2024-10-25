<?php 
	require('scripts/sb_functions.php');
	$logged_in = logged_in( true, false );
	
	read_config();
	
	global $blog_config;
	if ( isset( $_POST['blog_language'] ) ) {
		$blog_config[ 'blog_language' ] = $_POST['blog_language'];
	} else if ( isset( $_GET['blog_language'] ) ) {	
		$blog_config[ 'blog_language' ] = $_POST['blog_language'];
	}
	
	require('languages/' . $blog_config[ 'blog_language' ] . '/strings.php');
	sb_language( 'install01' );
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
		global $lang_string, $user_colors, $blog_config;
		
		echo( '<h2>' . $lang_string['title'] . '</h2>' );
		echo( $lang_string['instructions'] . '<p />' );
		
		// echo( '<hr noshade size="1" color=#' . $user_colors['inner_border_color'] . '>' );
		
		echo( '<a href="install02.php?blog_language=' . $blog_config[ 'blog_language' ] . '">' . $lang_string['begin'] . '</a><p />' );
	}
?>
<?php 
	theme_pagelayout();
?>
</html>
