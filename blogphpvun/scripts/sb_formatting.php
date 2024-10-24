<?php 

	// The Simple PHP Blog is released under the GNU Public License.
	//
	// You are free to use and modify the Simple PHP Blog. All changes 
	// must be uploaded to SourceForge.net under Simple PHP Blog or
	// emailed to apalmo <at> bigevilbrain <dot> com

	// --------------------
	// Entry Format Parsing
	// --------------------

	function clean_post_text( $str ) {
		// Cleans post text input.
		//
		// Strip out and replace pipes with colons. HTML-ize entities.
		// Use charset from the language file to make sure we're only
		// encoding stuff that needs to be encoded.
		//
		// This makes entries safe for saving to a file (since the data
		// format is pipe delimited.)
		global $lang_string;
		$str = str_replace( '|', ':', $str );
		$str = htmlspecialchars( $str, ENT_QUOTES, $lang_string['php_charset'] );

		return ( $str );
	}
	
	function blog_to_html( $str, $comment_mode, $strip_all_tags ) {
		// Convert Simple Blog tags to HTML.
		//
		// Search and replace simple tags. These tags don't have any
		// special attributes so we can do a str_replace() on them.
		//
		// ( Could use str_ireplace() but it's only supported in PHP 5. )
		global $blog_config;
		
		if ( $comment_mode ) {
			$tag_arr = array();
			if ( in_array( 'i', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'i' ); }
			if ( in_array( 'b', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'b' ); }
			if ( in_array( 'blockquote', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'blockquote' ); }
			if ( in_array( 'strong', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'strong' ); }
			if ( in_array( 'em', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'em' ); }
			if ( in_array( 'hN', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ); }
			if ( in_array( 'del', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'del' ); }
			if ( in_array( 'ins', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'ins' ); }
			if ( in_array( 'strike', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'strike' ); }
			if ( in_array( 'pre', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'pre' ); }
			if ( in_array( 'code', $blog_config[ 'comment_tags_allowed' ] ) ) { array_push( $tag_arr, 'code' ); }
		} else {
			$tag_arr = array('i', 'b', 'blockquote', 'strong', 'em', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'del', 'ins', 'strike', 'pre', 'code' );
		}
		
		// Build search and replace arrays.
		$search_arr = array();
		$replace_arr = array();
		for ( $i = 0; $i < count( $tag_arr ); $i++ ) {
			$tag = $tag_arr[$i];
			array_push( $search_arr,  '[' . strtolower( $tag ) . ']',  '[' . strtoupper( $tag ) . ']' );
			if ( $strip_all_tags ) {
				array_push( $replace_arr, '',  '' );
			} else {
				array_push( $replace_arr, '<' . strtolower( $tag ) . '>',  '<' . strtoupper( $tag ) . '>' );
			}
			array_push( $search_arr,  '[/' . strtolower( $tag ) . ']', '[/' . strtoupper( $tag ) . ']' );
			if ( $strip_all_tags ) {
				array_push( $replace_arr, '',  '' );
			} else {
				array_push( $replace_arr, '</' . strtolower( $tag ) . '>', '</' . strtoupper( $tag ) . '>' );
			}
		}
		
		// Do str_replace() replacement.
		$str = str_replace( $search_arr, $replace_arr, $str);
		
		// Replace [url] Tags:
		// The [url] tag has an optional "new" attribute. The "new"
		// attribute determines whether to open the link in the
		// same window or a new window.
		// new   - (true/false)
		//
		// [url=http://xxx]xxx[/url] 
		// [url=http://xxx new=true]xxx[/url]
		if ( $comment_mode ) {
			if ( in_array( 'url', $blog_config[ 'comment_tags_allowed' ] ) && $strip_all_tags === false ) {
				$str = replace_url_tag( $str, '[url=', ']', '[/url]', false );
				$str = replace_url_tag( $str, '[URL=', ']', '[/URL]', false );
			} else {
				$str = replace_url_tag( $str, '[url=', ']', '[/url]', true );
				$str = replace_url_tag( $str, '[URL=', ']', '[/URL]', true );
			}
		} else {
			if ( $strip_all_tags ) {
				$str = replace_url_tag( $str, '[url=', ']', '[/url]', true );
				$str = replace_url_tag( $str, '[URL=', ']', '[/URL]', true );
			} else {
				$str = replace_url_tag( $str, '[url=', ']', '[/url]', false );
				$str = replace_url_tag( $str, '[URL=', ']', '[/URL]', false );
			}
		}
		
		// Replace [img] Tags:
		// The [img] tag has an number of optional attributes -
		// width  - width of image in pixels
		// height - height of image in pixels
		// popup  - (true/false)
		// float  - (left/right)
		//
		// [img=http://xxx]
		// [img=http://xxx width=xxx height=xxx popup=true float=left]
		if ( $comment_mode ) {
			if ( in_array( 'img', $blog_config[ 'comment_tags_allowed' ] ) && $strip_all_tags === false  ) {
				$str = replace_img_tag( $str, '[img=', ']', false );
				$str = replace_img_tag( $str, '[IMG=', ']', false );
			} else {
				$str = replace_img_tag( $str, '[img=', ']', true );
				$str = replace_img_tag( $str, '[IMG=', ']', true );
			}
		} else {
			if ( $strip_all_tags ) {
				$str = replace_img_tag( $str, '[img=', ']', true );
				$str = replace_img_tag( $str, '[IMG=', ']', true );
			} else {
				$str = replace_img_tag( $str, '[img=', ']', false );
				$str = replace_img_tag( $str, '[IMG=', ']', false );
			}
		}
		
		// Emoticons
		// $smile_arr = array()
		// array_push( $smile_arr, array( ':)',  'smile.png') );
		// array_push( $smile_arr, array( ':-)', 'smile.png') );
		// array_push( $smile_arr, array( ':(',  'frown.png') );
		// array_push( $smile_arr, array( ':-(', 'frown.png') );
		// array_push( $smile_arr, array( ':o',  'surprised.png') );
		// array_push( $smile_arr, array( ':-o', 'surprised.png') );
		// array_push( $smile_arr, array( ':O',  'surprised.png') );
		// array_push( $smile_arr, array( ':-O', 'surprised.png') );
		// array_push( $smile_arr, array( ':p',  'sticking_out_tongue.png') );
		// array_push( $smile_arr, array( ':-p', 'sticking_out_tongue.png') );
		// array_push( $smile_arr, array( ':P',  'sticking_out_tongue.png') );
		// array_push( $smile_arr, array( ':-P', 'sticking_out_tongue.png') );
		// array_push( $smile_arr, array( ':D',  'laughing.png') );
		// array_push( $smile_arr, array( ':-D', 'laughing.png') );
		// for ( $i = 0; $i < count( $smile_arr ); $i++ ) {
		// 	$str = str_replace( $smile_arr[$i][0], '<img src="interface/emoticons/'.$smile_arr[$i][1].'" alt="$smile_arr[$i][0]">', $str );
		// }
		
		// Selectively replace line breaks and/or decode html entities.
		if ( $comment_mode ) {		
			if ( in_array( 'html', $blog_config[ 'comment_tags_allowed' ] ) && $strip_all_tags === false ) {
				$str = replace_html_tag( $str, false );
			} else {
				$str = replace_html_tag( $str, true );
			}
		} else {
			if ( $strip_all_tags ) {
				$str = replace_html_tag( $str, true );
			} else {
				$str = replace_html_tag( $str, false );
			}
		}
		
		return ( $str );
	}
	
	function replace_html_tag( $str, $strip_tags ) {
		// Replacements for HTML tags. Sub-function of blog_to_html.
		//
		// This function decodes HTML entities that are located between
		// HTML tags. Also, inserts <br />'s for new lines only if blocks
		// are outside the HTML tags.
		global $lang_string;
		
		$str_out = NULL;
		$tag_begin = '[html]';
		$tag_end = '[/html]';
		
		// Search for the openning HTML tag. Tag could be either upper or
		// lower case so we want to find the nearest one.
		//
		// Get initial $str_offset value.
		$temp_lower = strpos( $str, strtolower( $tag_begin ) );
		$temp_upper = strpos( $str, strtoupper( $tag_begin ) );
		if ( $temp_lower === false ) {
			if ( $temp_upper === false ) {
				$str_offset = false;
			} else {
				$str_offset = $temp_upper;
			}
		} else {
			if ( $temp_upper === false ) {
				$str_offset = $temp_lower;
			} else {
				$str_offset = min( $temp_upper, $temp_lower );
			}
		}
		
		while ( $str_offset !== false ) {
			// Store all the text BEFORE the openning HTML tag.
			//
			// Also, replace hard returns with '<br />' tags.
			$temp_str = substr( $str, 0, $str_offset );
			$temp_str = str_replace( chr(10), '<br />', $temp_str );
			$str_out = $str_out . $temp_str;
			
			// Store all text AFTER the tag
			$str = substr( $str, $str_offset + strlen( $tag_begin ) );
		
			// Search for the closing HTML tag. Find the nearest one.
			$temp_lower = strpos( $str, strtolower( $tag_end ) );
			$temp_upper = strpos( $str, strtoupper( $tag_end ) );
			if ( $temp_lower === false ) {
				if ( $temp_upper === false ) {
					$str_offset = false;
				} else {
					$str_offset = $temp_upper;
				}
			} else {
				if ( $temp_upper === false ) {
					$str_offset = $temp_lower;
				} else {
					$str_offset = min( $temp_upper, $temp_lower );
				}
			}
			
			if ( $str_offset !== false ) {
				// Store all the text BETWEEN the HTML tags.
				//
				// Also, decode HTML entities between the tags.
				$temp_str = substr( $str, 0, $str_offset );
				if ( $strip_tags === false ) {
					$temp_str = html_entity_decode( $temp_str, ENT_QUOTES, $lang_string['php_charset'] );
				}
				$str_out = $str_out . $temp_str;
				
				// Store sub_string after the tag.
				$str = substr( $str, $str_offset + strlen( $tag_end ) );
				
				// Search for openning HTML tag again.
				$temp_lower = strpos( $str, strtolower( $tag_begin ) );
				$temp_upper = strpos( $str, strtoupper( $tag_begin ) );
				if ( $temp_lower === false ) {
					if ( $temp_upper === false ) {
						$str_offset = false;
					} else {
						$str_offset = $temp_upper;
					}
				} else {
					if ( $temp_upper === false ) {
						$str_offset = $temp_lower;
					} else {
						$str_offset = min( $temp_upper, $temp_lower );
					}
				}
			}
		}
		
		// Append remainder of text.
		//
		// All this text will be outside of any HTML tags so
		// we need to encode the line breaks.
		$str = str_replace( chr(10), '<br />', $str );
		$str = $str_out . $str;
		
		return ( $str );
	
	}
	
	function replace_url_tag( $str, $tag_begin, $tag_end, $tag_close, $strip_tags ) {
		// Replacements for URL tags. Sub-function of blog_to_html.
		//
		// If $strip_tags == true then it will strip out the tag
		// instead of making them HTML.
		$str_out = NULL;
		
		// Search for the beginning part of the tag.
		$str_offset = strpos( $str, $tag_begin );
		while ( $str_offset !== false ) {
			// Store sub_string before the tag.
			$str_out = $str_out . substr( $str, 0, $str_offset );
			// Store sub_string after the tag.
			$str = substr( $str, $str_offset + strlen( $tag_begin ) );
			
			// Search for the ending part of the tag.
			$str_offset = strpos( $str, $tag_end );
			if ( $str_offset !== false ) {
				
				if ( $strip_tags == false ) {
					// Store attribues BETWEEN between the tags.
					$attrib_array = explode( ' ', substr( $str, 0, $str_offset ) );
					$attrib_new = NULL;
					
					if ( is_array( $attrib_array ) ) {
						$str_url = $attrib_array[0];
						
						for ( $i = 1; $i < count( $attrib_array ); $i++ ) {
							$temp_arr = explode( '=', $attrib_array[$i] );
							if ( is_array( $temp_arr ) && count( $temp_arr ) == 2 ) {
								switch ( $temp_arr[0] ) {
									case 'new';
										$attrib_new = $temp_arr[1];
										break;
								}
							}
						}
					} else {
						$str_url = $attrib_array;
					}
					
					// Append HTML tag.
					if ( isset( $attrib_new ) ) {
						if ( $attrib_new == 'false' ) {
							$str_out = $str_out . '<a href="' . $str_url . '">';						
						} else {
							$str_out = $str_out . '<a href="' . $str_url . '" target="_blank">';
						}
					} else {
						$str_out = $str_out . '<a href="' . $str_url . '" target="_blank">';					
					}
				}
				
				// Store sub_string AFTER the tag.
				$str = substr( $str, $str_offset + strlen( $tag_end ) );
				
				// Look for closing tag.
				$str_offset = strpos( $str, $tag_close );
				if ( $str_offset !== false ) {
					$str_link = substr( $str, 0, $str_offset );
					if ( $strip_tags == false ) {
						$str_out = $str_out . $str_link . '</a>';
					} else {
						$str_out = $str_out . $str_link;
					}					
					$str = substr( $str, $str_offset + strlen( $tag_close ) );
				}
				
				// Search for next beginning tag.
				$str_offset = strpos( $str, $tag_begin );
			}
		}
		
		// Append remainder of tag.
		$str = $str_out . $str;
		
		return ( $str );
	}
	
	function replace_img_tag( $str, $tag_begin, $tag_end, $strip_tags ) {
		// Replacements for IMG tags. Sub-function of blog_to_html.
		// 
		// I made this another function because I wanted to be able
		// to call it for upper and lower case '[img=]' tags...
		//
		// If $strip_tags == true then it will strip out the tag
		// instead of making them HTML.
		global $theme_vars;
		
		$str_out = NULL;
		
		// Search for the beginning part of the tag.
		$str_offset = strpos( $str, $tag_begin );
		while ( $str_offset !== false ) {
			// Store sub_string before the tag.
			$str_out = $str_out . substr( $str, 0, $str_offset );
			// Store sub_string after the tag.
			$str = substr( $str, $str_offset + strlen( $tag_begin ) );
			
			// Search for the ending part of the tag.
			$str_offset = strpos( $str, $tag_end );
			if ( $str_offset !== false ) {
			
				if ( $strip_tags == true ) {
					
					// Store sub_string after the tag.
					$str = substr( $str, $str_offset + strlen( $tag_end ) );
					// Search for next beginning tag.
					$str_offset = strpos( $str, $tag_begin );
					
				} else {
				
					// Store attribues between between the tags.
					$attrib_array = explode( ' ', substr( $str, 0, $str_offset ) );
					$attrib_width = NULL;
					$attrib_height = NULL;
					$attrib_popup = NULL;
					$attrib_float = NULL;
					
					if ( is_array( $attrib_array ) ) {
						$str_url = $attrib_array[0];
						
						for ( $i = 1; $i < count( $attrib_array ); $i++ ) {
							$temp_arr = explode( '=', $attrib_array[$i] );
							if ( is_array( $temp_arr ) && count( $temp_arr ) == 2 ) {
								switch ( $temp_arr[0] ) {
									case 'width';
										$attrib_width = intval( $temp_arr[1] );
										break;
									case 'height';
										$attrib_height = intval( $temp_arr[1] );
										break;
									case 'popup';
										$attrib_popup = $temp_arr[1];
										break;
									case 'float';
										$attrib_float = $temp_arr[1];
										break;
								}
							}
						}
					} else {
						$str_url = $attrib_array;
					}
				
					// Grab image size and calculate scaled sizes
					
					// if ( file_exists( $str_url ) !== false ) {
					$img_size = @getimagesize( $str_url );
					if ( $img_size !== false ) {
						$width = $img_size[0];
						$height = $img_size[1];
						$max_image_width = $theme_vars['max_image_width'];
						
						if ( isset( $attrib_width ) && isset( $attrib_height ) ) {
								$width = $attrib_width;
								$height = $attrib_height;
						} else {
							if ( isset( $attrib_width ) ) {
								$height = round( $height * ( $attrib_width / $width ) );
								$width = $attrib_width;
							}
							
							if ( isset( $attrib_height ) ) {
								$width = round( $width * ( $attrib_height / $height ) );
								$height = $attrib_height;
							}
						}
						
						if ( $width > $max_image_width ) {
							$height = round( $height * ( $max_image_width / $width ) );
							$width = $max_image_width;
						}
						
						
						if ( isset( $attrib_popup ) ) {
							if ( $attrib_popup == 'true' ) {
								$str_out = $str_out . '<a href="javascript:openpopup(\'' . $str_url . '\','.$img_size[0].','.$img_size[1].',false);"><img src="' . $str_url . '" width='.$width.' height='.$height.' border=0 alt=\'\'';
								if ( isset( $attrib_float ) ) {
									switch ( $attrib_float ) {
										case 'left';
											$str_out = $str_out . ' id="img_float_left"';
											break;
										case 'right';
											$str_out = $str_out . ' id="img_float_right"';
											break;
									}
								}
								$str_out = $str_out . '></a>';
							} else {
								$str_out = $str_out . '<img src="' . $str_url . '" width='.$width.' height='.$height.' border=0 alt=\'\'';
								if ( isset( $attrib_float ) ) {
									switch ( $attrib_float ) {
										case 'left';
											$str_out = $str_out . ' id="img_float_left"';
											break;
										case 'right';
											$str_out = $str_out . ' id="img_float_right"';
											break;
									}
								}
								$str_out = $str_out . '>';
							}
						} else {
							if ( $width != $img_size[0] || $height != $img_size[1] ) {
								$str_out = $str_out . '<a href="javascript:openpopup(\'' . $str_url . '\','.$img_size[0].','.$img_size[1].',false);"><img src="' . $str_url . '" width='.$width.' height='.$height.' border=0 alt=\'\'></a>';							
							} else {
								$str_out = $str_out . '<img src="' . $str_url . '" width='.$width.' height='.$height.' border=0 alt=\'\'>';
							}
						}
										
						// Store sub_string after the tag.
						$str = substr( $str, $str_offset + strlen( $tag_end ) );
						// Search for next beginning tag.
						$str_offset = strpos( $str, $tag_begin );
					} else {
						// Append HTML tag.
						if ( isset( $attrib_popup ) ) {
							if ( $attrib_popup == 'true' ) {
								$str_out = $str_out . '<a href="javascript:openpopup(\'' . $str_url . '\',800,600,false);"><img src="' . $str_url . '" border=0 alt=\'\'></a>';						
							} else {
								$str_out = $str_out . '<img src="' . $str_url . '" border=0 alt=\'\'>';		
							}
						} else {
							$str_out = $str_out . '<a href="javascript:openpopup(\'' . $str_url . '\',800,600,false);"><img src="' . $str_url . '" border=0 alt=\'\'></a>';	
						}
										
						// Store sub_string after the tag.
						$str = substr( $str, $str_offset + strlen( $tag_end ) );
						// Search for next beginning tag.
						$str_offset = strpos( $str, $tag_begin );
					}
				}
			}
		}
		
		// Append remainder of tag.
		$str = $str_out .  $str;
		
		return ( $str );
	}
?>