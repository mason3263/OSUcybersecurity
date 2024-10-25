<?php 

	// The Simple PHP Blog is released under the GNU Public License.
	//
	// You are free to use and modify the Simple PHP Blog. All changes 
	// must be uploaded to SourceForge.net under Simple PHP Blog or
	// emailed to apalmo <at> bigevilbrain <dot> com

	// ----------------
	// Search Functions
	// ----------------
	
	function search ( $search_str ) {
		// Search in contents feature a list of keywords separated by spaces
		// (c) 2004 Javier Guti�rrez Chamorro (Guti), guti <at> ya <dot> com
		//
		// Simple PHP Version: 0.3.7
		// Search Version:   0.3.7
		//
	
		// Read entries by month, year and/or day. Generate HTML output.
		//
		// Used for the main Index page.
		global $lang_string, $blog_config, $user_colors;
		
		// To avoid server overload
		sleep(1);
		
		$output_str = '';
		
		$entry_file_array = blog_entry_listing();

		// Flip entry order
		if ( $blog_config[ 'blog_entry_order' ] == 'old_to_new' ) {
			$entry_file_array = array_reverse( $entry_file_array );
		}
		
		$words=@split( ' ', strtoupper( $search_str ) );
		
		if ( strlen( $search_str ) > 1) {
			for ( $i = 0; $i < count( $words ); $i++) {
				$words[$i] = trim($words[$i] );
			}
			
			// Loop through entry files
			for ( $i = 0; $i < count( $entry_file_array ); $i++ ) {
				list( $entry_filename, $year_dir, $month_dir ) = explode( '|', $entry_file_array[ $i ] );
				$contents = sb_read_file( 'content/' . $year_dir . '/' . $month_dir . '/' . $entry_filename );
				$j = 0;
				$found = true;
				$text = strtoupper( $contents );
				while ( ( $j<count( $words ) ) && ( $found ) ) {
					if ( $words[$j] !== '' ) {
						$found = $found && ( strpos( $text, $words[$j] ) !== false );
					}
					$j++;
				}
				if ( $found ) {
					// list( $blog_subject, $blog_date, $blog_text ) = explode('|', ( $contents ) );
					$blog_entry_data = blog_entry_to_array( 'content/' . $year_dir . '/' . $month_dir . '/' . $entry_filename );
					$output_str = $output_str . '<a href="index.php?entry=' . sb_strip_extension( $entry_filename ) . '" title="' . format_date( $blog_entry_data["DATE"] ) . '">' . $blog_entry_data["SUBJECT"] . '</a><br />';
				}
				// Search Comments
				if ( $blog_config[ 'blog_enable_comments' ] == true ) {
					$comment_file_array = sb_folder_listing( 'content/' . $year_dir . '/' . $month_dir . '/' . sb_strip_extension( $entry_filename ) . '/comments/', array( '.txt', '.gz' ) );
	 
					for ( $k = 0; $k < count( $comment_file_array ); $k++ ) {
						$comment_filename =  $comment_file_array[ $k ];
						//We only want to search inside comments, not the counter
						if ( strpos($comment_filename, 'comment') === 0 )
						{
							$contents_comment = sb_read_file( 'content/' . $year_dir . '/' . $month_dir . '/' . sb_strip_extension( $entry_filename ) . '/comments/' . $comment_filename );
							$found_in_comment = true;
							$l = 0;
							$text = strtoupper( $contents_comment );
							while ( ( $l< count( $words ) ) && ( $found_in_comment ) ) {
								if ( $words[$l] !== '' ) {
									$found_in_comment = $found_in_comment && ( strpos( $text, $words[$l] ) !== false );
								}
								$l++;
							}
							if ( $found_in_comment ) {
								if ( $found == false ) {
									// list( $blog_subject, $blog_date, $blog_text ) = explode('|', ( $contents ) );
									$blog_entry_data = blog_entry_to_array( 'content/' . $year_dir . '/' . $month_dir . '/' . $entry_filename );
									$output_str = $output_str . $blog_entry_data["SUBJECT"] . '<br />';
								}
								
								// list( $comment_author, $comment_date, $comment_text ) = explode('|', ( $contents_comment ) );
								$comment_entry_data = comment_to_array( 'content/' . $year_dir . '/' . $month_dir . '/' . sb_strip_extension( $entry_filename ) . '/comments/' . $comment_filename );

								global $theme_vars;
								if ( $blog_config[ 'blog_comments_popup' ] == 1 ) {
									$output_str = $output_str . '&nbsp;&nbsp;&nbsp;<a href="javascript:openpopup(\'comments.php?y='.$year_dir.'&m='.$month_dir.'&entry='. sb_strip_extension($entry_filename).'\','.$theme_vars['popup_window']['width'].','.$theme_vars['popup_window']['height'].',true)">' . $comment_entry_data["NAME"] . '</a><br />';
								} else {
									$output_str = $output_str . '&nbsp;&nbsp;&nbsp;<a href="comments.php?y=' . $year_dir . '&m=' . $month_dir . '&entry=' . sb_strip_extension( $entry_filename ) . '" title="' . format_date( $comment_entry_data["DATE"] ) . '">' . $comment_entry_data["NAME"] . '</a><br />';
								}
							}
						}
					}
				}
			}
			// Search static pages
			$static_file_array = sb_folder_listing( 'content/static/', array( '.txt', '.gz' ) );
			for ( $i = 0; $i < count( $static_file_array ); $i++ ) {
				$static_filename =  $static_file_array[ $i ];
				$contents_static = sb_read_file( 'content/static/' . $static_filename );
				$found_in_static = true;
				$j = 0;
				$text = strtoupper( $contents_static );
				while ( ( $j< count( $words ) ) && ( $found_in_static ) ) {
					if ( $words[$j] !== '' ) {
						$found_in_static = $found_in_static && ( strpos( $text, $words[$j] ) !== false );
					}
					$j++;
				}
				if ( $found_in_static ) {
					$blog_static_data = static_entry_to_array( 'content/static/' . $static_filename );
					$output_str = $output_str . '<a href="static.php?page=' . sb_strip_extension( $static_filename ) . '" title="' . format_date( $blog_static_data[ 'DATE' ] ) . '">' . $blog_static_data[ 'SUBJECT' ] . '</a><br />';
				}
			}
		}
		return ( $output_str );
	}
?>