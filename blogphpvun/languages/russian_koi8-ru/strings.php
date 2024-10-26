<?php
	// Russian Language File
	// (c) 2004 Artyom Pervukhin, trem <at> pm <dot> convex <dot> ru
	//
	// Simple PHP Version: 0.3.7
	// Language Version:   0.3.7.1
	
	
	function sb_language( $page ) {
		global $language, $html_charset, $php_charset, $lang_string;
			
		// Language: English
		$lang_string['language'] = 'russian';
		
		// ISO Charset: ISO-8859-1
		$lang_string['html_charset'] = 'koi8-ru';
		$lang_string['php_charset'] = 'koi8-ru';
		
		$lang_string['locale'] = 'RUS'; // <-- New 0.3.7
		setlocale(LC_TIME, $lang_string['locale'] ); // <-- New 0.3.7
		
		// Some Global Strings
		
		// Menu
		$lang_string['menu_links'] = "������";
		$lang_string['menu_home'] = "�� �������";
		$lang_string['menu_contact'] = "Contact Me"; // <-- New 0.3.8
		$lang_string['menu_stats'] = "Stats"; // <-- New 0.3.7r
		$lang_string['menu_archive'] = "Archives";
		$lang_string['menu_menu'] = "����";
		$lang_string['menu_most_recent'] = "��������� �����������";
		$lang_string['menu_add'] = "�������� �������";
		$lang_string['menu_add_static'] = "�������� ��������";
		$lang_string['menu_upload'] = "�������� ��������";
		$lang_string['menu_setup'] = "���������";
		$lang_string['menu_categories'] = "Categories"; // 0.3.7q
		$lang_string['menu_info'] = "Information"; // <-- New 0.3.7
		$lang_string['menu_options'] = "���������";
		$lang_string['menu_themes'] = "Themes";
		$lang_string['menu_colors'] = "�����";
		$lang_string['menu_change_login'] = "�������� ������������";
		$lang_string['menu_logout'] = "�����";
		$lang_string['menu_login'] = "�����";
		$lang_string['menu_most_recent_entries'] = "Most Recent Entries";
		$lang_string['menu_most_recent_trackback'] = "Most Recent Trackbacks"; // <-- New 0.3.8
		$lang_string['menu_add_block'] = "Blocks";
		
		// Other
		$lang_string['home'] = "��������� �� �������";
		$lang_string['nav_next'] = 'Next'; // <-- New 0.3.7
		$lang_string['nav_back'] = 'Back'; // <-- New 0.3.7
		$lang_string['search_title'] = 'Search:'; // <-- New 0.3.7
		$lang_string['search_go'] = 'Go'; // <-- New 0.3.7
		$lang_string['page_generated_in'] = 'Page Generated in %s seconds'; // <-- New 0.3.7
		
		// SB Functions
		$lang_string['sb_months'] = array( '������', '�������', '����', '������', '���', '����', '����', '������', '��������', '�������', '������', '�������' );
		$lang_string['sb_default_title'] = '��� ��������';
		$lang_string['sb_default_author'] = '��� ������';
		$lang_string['sb_default_footer'] = '��� �������';
		
		$lang_string['sb_edit'] = '��������';
		$lang_string['sb_delete'] = '�������';
		$lang_string['sb_permalink'] = 'permalink'; // <-- New 0.3.8
		$lang_string['sb_trackback'] = 'trackbacks'; // <-- New 0.3.8
		
		$lang_string['sb_add_comment_btn'] = '�������� �����������';
		$lang_string['sb_comment_btn_number_first'] = false;
		$lang_string['sb_comment_btn'] = '�����������';
		$lang_string['sb_comments_plural_btn_number_first'] = false;
		$lang_string['sb_comments_plural_btn'] = '������������:';
		
		// ( 1 view )
		$lang_string['sb_view_counter_pre'] = '';
		$lang_string['sb_view_counter_post'] = ' ��������';
		// ( 2 views )
		$lang_string['sb_view_counter_plural_pre'] = '����������: ';
		$lang_string['sb_view_counter_plural_post'] = '';
		
		$lang_string['sb_add_link_btn'] = '�������� ������';
		
		$lang_string['sb_rate_entry_btn'] = 'Click to Rate Entry';
		
		// Entry Text Editor
		if ( $page == 'add' || $page == 'add_static' || $page == 'comments' || $page == 'add_block' ) {
				$lang_string['label_subject'] = "����:";
				$lang_string['label_insert'] = "����������� �����������:";
				$lang_string['btn_bold'] = " b ";
				$lang_string['btn_italic'] = " i ";
				$lang_string['btn_image'] = "img";
				$lang_string['btn_url'] = "url";
				$lang_string['view_images'] = "����������� ���������� ��������";
				$lang_string['label_entry'] = "����� �������:";
				$lang_string['btn_preview'] = "&nbsp;�����������&nbsp;";
				$lang_string['btn_post'] = "&nbsp;������������&nbsp;";
				$lang_string['file_name'] = "Static File Name: (no spaces or file extensions)"; // <-- New 0.3.8
				// Javascript Strings
				$lang_string['insert_styles'] = "������� ������������� �����";
				$lang_string['insert_image'] = "������� ������ URL ��������";
				$lang_string['insert_url1'] = "������� �����, ������������ � ���� ������ (�������������)";
				$lang_string['insert_url2'] = "������� ������ URL ������";
				$lang_string['insert_url3'] = "Open URL in new window (Optional):"; // <-- New 0.3.6
				$lang_string['form_error'] = "����������, ��������� ���� ���� � ����������.";
				// More Javascript Strings <-- New 0.3.6
				$lang_string['insert_image_optional'] = 'Optional:';
				$lang_string['insert_image_width'] = 'Width (Optional):';
				$lang_string['insert_image_height'] = 'Height (Optional):';
				$lang_string['insert_image_popup'] = 'View full-size in pop-up when clicked (Optional):';
				$lang_string['insert_image_float'] = 'Float (Optional):';
		}
	
		switch ($page) {
			case 'add':
				// Add Entry
				$lang_string['title'] = "���������� �������";
				$lang_string['instructions'] = "��������� �����, �� ���������� ������� <strong>'�����������'</strong> ��� ���������������� ��������� ������� ��� <strong>'������������'</strong> ��� ���������� ������� �� �����.";
				$lang_string['title_ad'] = "Confirm Trackback Pings"; // <-- New 0.3.8
				$lang_string['instructions_ad'] = "These are the Auto-Discovered URIs you're about to ping. If you do not want to ping a certain URI, uncheck it below. Then press the 'OK' button to ping the checked URIs or press 'Cancel' to not ping at all."; // <-- New 0.3.8
				$lang_string['label_tb_ping'] = "Trackback ping(s) to send (comma separated)"; // <-- New 0.3.8
				$lang_string['label_tb_autodiscovery'] = "autodiscovery"; // <-- New 0.3.8
				// Preview / Edit Entry
				$lang_string['title_preview'] = "�������� / �������������� �������";
				$lang_string['instructions_preview'] = "��� �������� ���� �������. <strong>�������� ��������</strong>: ���� �� ����������� ��������� ������, ���� �������� �������� ��� ������, ���������, ��� ��� ���� ����� ����������� ����.";
				$lang_string['title_update'] = "���������� �������";
				$lang_string['instructions_update'] = "�� ������ �������� ���� �������, ���������������� ��������� ������. ����� ���������, ����������� ������ <strong>'�����������'</strong> � '<strong>������������'</strong>.";
				$lang_string['ok_btn'] = "&nbsp;OK&nbsp;"; // <-- New 0.3.8
				$lang_string['cancel_btn'] = "&nbsp;Cancel&nbsp;"; // <-- New 0.3.8
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>������� �� ���������! ��� ������� ���������� �������� ������.<br /><br />����� �������:<br />";
				break;
			case 'add_static':
				// Add Entry
				$lang_string['title'] = "�������� ����������� ��������";
				$lang_string['instructions'] = "��������� ��������� ����� ��� �������� ����������� ��������. � ������� �� ������� ������, ����������� �������� ������������ � ���� ������. �� ��� ������ ��������� ����������, ������� ������ ���� ������ ��������: ��������, ������ �� ����� ���������� �������, ���������� ������ � �.�. ����������� ������ '�����������' ��� ���������������� ��������� ��������, ��� '������������' ��� ���������� ��������.";
				// Preview / Edit Entry
				$lang_string['title_preview'] = "�������� / �������������� ����������� ��������";
				$lang_string['instructions_preview'] = "��� �������� ���� ����������� ��������. ���� �� ����������� �������������� ��� ��������, �� �������� ������� ��� '����'.";
				$lang_string['title_update'] = "�������� ����������� ��������";
				$lang_string['instructions_update'] = "�� ������ �������� ��������, ��������� ��������� �����. ����� ��������� ��������������, ����������� ������ '��������' � '������������'.";
				$lang_string['form_error'] = "Please complete the Subject, Entry, and File Name fields.";	
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>�������� �� ���������.<br /><br />����� �������:<br />";
				break;
			case 'add_block':
				// Add / Manage Blocks
				$lang_string['title'] = "Add / Manage Links";
				$lang_string['instructions'] = "Add custom Blocks";
				$lang_string['up'] = "up";
				$lang_string['down'] = "down";
				$lang_string['edit'] = "edit";
				$lang_string['delete'] = "delete";
				$lang_string['block_name'] = "Block Name:";
				$lang_string['block_content'] = "Block content:";
				$lang_string['instructions_edit'] = "You are currently editing block:";
				$lang_string['instructions_modify'] = "Click below to modify a block:";
				$lang_string['submit_btn_edit'] = "Edit Block";
				$lang_string['submit_btn_add'] = "Add Block";
				$lang_string['form_error'] = "Please complete the Name field.";
				break;
			case 'add_link':
				$lang_string['static_pages'] = "Static Pages:";
				// Add / Manage Links
				$lang_string['title'] = "���������� / ��������� ������";
				$lang_string['instructions'] = "����� �� ������ �������� ������ �� ������ �����. ��������� ����� � ������� ������ <strong>'��������'</strong>. ��������� '�����' ��� '����' ��� ��������� ������� ���������� ������. ����������� '��������' ��� �������������� ������; '�������' - ��� ��������.";
				$lang_string['up'] = "�����";
				$lang_string['down'] = "����";
				$lang_string['edit'] = "��������";
				$lang_string['delete'] = "�������";
				$lang_string['link_name'] = "��������:";
				$lang_string['link_url'] = "URL:";
				$lang_string['instructions_edit'] = "�� ������������ ��������� ������:";
				$lang_string['instructions_modify'] = "�������� ������ ������:";
				$lang_string['submit_btn_edit'] = "�������� ������";
				$lang_string['submit_btn_add'] = "�������� ������";
				$lang_string['form_error'] = "����������, ��������� ���� �������� � ������.";
				break;
			case 'categories':
				// Add / Manage Links
				$lang_string['title'] = "Add / Manage Categories";
				$lang_string['instructions'] = "Use the form below to add and edit your categories. Each category item should be in this format 'category name (id number)'. Indent items with spaces to create heirarchies.<br /><br /><b>Example:</b><br />General (1)<br />News (3)<br />&nbsp;&nbsp;Announcements (6)<br />&nbsp;&nbsp;Events (5)<br />&nbsp;&nbsp;&nbsp;&nbsp;Misc (7)<br />Technology (2)<br />";
				$lang_string['error'] = "Error";
				$lang_string['current_categories'] = "Current Categories";
				$lang_string['no_categories_found'] = "No Categories Found";
				$lang_string['category_list'] = "Category List:";
				$lang_string['validate'] = "Validate";
				$lang_string['submit_btn'] = "&nbsp;Submit&nbsp;";
				break;
			case 'colors':
				// Change Colors
				$lang_string['title'] = "��������� �������� �����";
				$lang_string['instructions'] = "�� ������ ������ �����, ������������ �� ����� ���������. ����������� ������� ��� ������ ����������� �����, ����� ������� ����������������� �������� ����� � ���� �����.";
				$lang_string['bg_color'] = "��� ��������";
				$lang_string['main_bg_color'] = "��� �������� �������";
				$lang_string['border_color'] = "�����";
				$lang_string['inner_border_color'] = "���������� �����";
				$lang_string['header_bg_color'] = "��� �����";
				$lang_string['header_txt_color'] = "����� �����";
				$lang_string['menu_bg_color'] = "��� ����";
				$lang_string['footer_bg_color'] = "��� �������";
				$lang_string['txt_color'] = "�������� �����";
				$lang_string['headline_txt_color'] = "���������";
				$lang_string['date_txt_color'] = "����� ����";
				$lang_string['footer_txt_color'] = "����� �������";
				$lang_string['link_reg_color'] = "������� ������";
				$lang_string['link_hi_color'] = "������ ��������";
				$lang_string['link_down_color'] = "������ �������";
				// More Colors
				$lang_string['entry_bg'] = "Entry BG";
				$lang_string['entry_title_bg'] = "Entry Title BG";
				$lang_string['entry_border'] = "Entry Border";
				$lang_string['entry_title_text'] = "Entry Title Text";
				$lang_string['entry_text'] = "Entry Text";
				$lang_string['menu_bg'] = "Menu BG";
				$lang_string['menu_title_bg'] = "Menu Title BG";
				$lang_string['menu_border'] = "Menu Border";
				$lang_string['menu_title_text'] = "Menu Title Text";
				$lang_string['menu_text'] = "Menu Text";
				$lang_string['menu_link_reg_color'] = "Menu Link Default";
				$lang_string['menu_link_hi_color'] = "Menu Link Hover";
				$lang_string['menu_link_down_color'] = "Menu Link Active";
				// Submit
				$lang_string['color_preset'] = "Color Schemes:"; // 0.3.7q
				$lang_string['scheme_name'] = "Enter a custom color scheme name:"; // 0.3.7q
				$lang_string['scheme_file'] = "Enter scheme file name: (no spaces or file extensions)"; // 0.3.7q
				$lang_string['save_btn'] = "&nbsp;Save&nbsp;"; // 0.3.7q
				$lang_string['form_error'] = "Please enter a name for your custom color scheme."; // 0.3.7q
				$lang_string['submit_btn'] = "&nbsp;����������&nbsp;";
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>���������� �� ���������! �� ����� ������� ���������� ��������� ������.<br /><br />����� �������:<br />";
				break;
			case 'comments':
				// Comments
				$lang_string['title'] = "�����������";
				$lang_string['header'] = "���������� �����������";
				$lang_string['instructions'] = "��������� ����� ��� ���������� ������ �����������.";
				$lang_string['comment_name'] = "���� ���:";
				$lang_string['comment_email'] = "Email:"; // 0.3.8
				$lang_string['comment_url'] = "URL:"; // 0.3.8
				$lang_string['comment_remember'] = "Remember me:"; // 0.3.8
				$lang_string['comment_text'] = "����� �����������:";
				$lang_string['post_btn'] = "&nbsp;��������&nbsp;";
				$lang_string['delete_btn'] = "�������";
				// Error Response
				$lang_string['error_add'] = "<h2>���!</h2>����������� �� ��������. ��� ������� ���������� ��������� ���������.<br /><br />����� �������:<br />";
				$lang_string['error_delete'] = "<h2>���!</h2>����������� �� ��� ������. ��� ������� �������� ��������� ������.<br /><br />����� �������:<br />";
				$lang_string['form_error'] = "����������, ��������� ���� ����� � ������ �����������.";
				break;
			case 'delete':
				$lang_string['title'] = "�������� �������";
				$lang_string['instructions'] = "�� ����������� ������� ��� �������. ��� ��� �������������� ��� �� ������ ������� ������ ���, ��� ��� ����������� ������������ ��������� �� �������������...";
				$lang_string['ok_btn'] = "&nbsp;�������&nbsp;";
				$lang_string['cancel_btn'] = "&nbsp;������&nbsp;";
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>�� ����� ������� �������.<br /><br />����� �������:<br />";
				break;
			case 'delete_static':
				$lang_string['title'] = "������� ����������� ��������";
				$lang_string['instructions'] = "�� ����������� ������� ��� ��������. ��������� ��� ���, ��� ������ ������� ������ ��, ����������� ������ �� �������������.";
				$lang_string['ok_btn'] = "&nbsp;��&nbsp;";
				$lang_string['cancel_btn'] = "&nbsp;������&nbsp;";
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>�������� �� ���� �������.<br /><br />����� �������:<br />";
				break;
			case 'image_list':
				$lang_string['title'] = "������� ��������";
				$lang_string['instructions'] = "��������� �� ��������������� ������ ��� ��������� ��������.<br /><br />��� ���������� �������� � ����� �������:<br />1) ������� ������ ������� ���� �� ������ � �������� ����� ���� <em>���������� ������</em>.<br />2) ��������� � ���� ���������� / ��������� �������.<br />3) ������� ������ <strong>'img'</strong> � �������� � ����������� ������ ������ �� ������ ������.";
				break;
			case 'info': // New 0.3.7
				$lang_string['title'] = "Meta-Data Information";
				$lang_string['instructions'] = "The information below is used for &quot;meta-data&quot;, which helps search engines correctly find and identify your site. Information may also be used in RSS feeds.";
				$lang_string['info_keywords'] = "Keywords: (List of keywords separated by commas.)";
				$lang_string['info_description'] = "Description: (An abstract or a free-text description of your site.)";
				$lang_string['info_copyright'] = "Rights: (Copyright statement, or link to document containing information.)";
				$lang_string['submit_btn'] = "&nbsp;Submit&nbsp;";
				// Error Response
				$lang_string['error'] = "<h2>Whoops!</h2>Information not saved. I ran into a problem while saving your information.<br /><br />Server Reported:<br />";
				$lang_string['form_error'] = "Please complete the Title and Author fields.";
				break;
			case 'index':
				// Index
				break;
			case 'static':
				// Index
				break;
			case 'rating': // New 0.3.8
				$lang_string['error'] = "<h2>Whoops!</h2>Information not saved. I ran into a problem while saving your information.<br /><br />Server Reported:<br />";
				break;
			case 'login':
				$lang_string['upgrade'] = "<h2>Upgrade</h2>"; // New 0.3.8
				$lang_string['upgrade_count'] = "%n comment files need to be upgraded:"; // New 0.3.8
				$lang_string['upgrade_url'] = "Upgrade Comments"; // New 0.3.8
				$lang_string['title'] = "����";
				$lang_string['instructions'] = "������� ��� ������������ � ������";
				$lang_string['username'] = "��� ������������:";
				$lang_string['password'] = "������:";
				$lang_string['submit_btn'] = "&nbsp;�����&nbsp;";
				// Success
				$lang_string['success'] = "<h2>�����������!</h2>�� ������� ������������������ � �������. �������� ��������������! :)<br />";
				// Wrong Password
				$lang_string['wrong_password'] = "<h2>���!</h2>��� �� ������� ������������������. ��������� ������������ ����� ����� ������������ � ������.<br />";
				$lang_string['form_error'] = "����������, ��������� ���� ����� ������������ � ������.";
				break;
			case 'logout':
				$lang_string['title'] = "�����";
				$lang_string['instructions'] = "<h2>���!</h2>����� �� ������: �� ������ ��������� cookie. �������, � ������ �� ��� ��� ����������������?..<br />";
				break;
			case 'forms':
				$lang_string['title'] = "";
				$lang_string['instructions'] = "";
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>���������� �� ���������. ��� ������� ���������� ��������� ������.<br /><br />����� �������:<br />";
				break;
			case 'set_login': // <-- New
				$lang_string['title'] = "Change Username &amp; Password";
				$lang_string['instructions'] = "Use the form below to change your Username and/or Password. Enter the Username and Password that you want to use.";
				$lang_string['username'] = "Username:";
				$lang_string['password'] = "Password:";
				$lang_string['submit_btn'] = "&nbsp;Submit&nbsp;";
				// Success
				$lang_string['success'] = "<h2>Success!</h2>Your Username and/or Password is active. Happy blogging!<p />";
				// Wrong Password
				$lang_string['wrong_password'] = "<h2>Whoops!</h2>Information not saved. I ran into a problem while saving your Username and/or Password.<br /><br />Server Reported:<br />";
				$lang_string['form_error'] = "Please complete the Username and Password fields.";
				break;
			case 'install00': // <-- New
				$lang_string['title'] = "Welcome";
				$lang_string['instructions'] = "
				Thank you for choosing Simple PHP Blog!";
				$lang_string['blog_choose_language'] = "Choose Language:";
				$lang_string['submit_btn'] = "&nbsp;Submit&nbsp;";
				break;
			case 'install01': // <-- New
				$lang_string['title'] = "Welcome";
				$lang_string['instructions'] = "
				Thank you for choosing Simple PHP Blog!<br /><br />Simple PHP Blog is a light-weight blogging system. It requires PHP 4.1 or greater, and write-permissions on the server. All information is stored in flat-files, so no database is required.<br /><br />
				In order to begin, Simple PHP Blog needs to create three folders ('config', 'content', and 'images') in which to store your information.<br /><br />
				<b>Click below to begin setup:</b>";
				$lang_string['begin'] = "[ Begin Setup ]";
				break;
			case 'install02': // <-- New
				$lang_string['title'] = "Setup";
				$lang_string['instructions'] = "Trying to create 'config', 'content', and 'images' folders:";
				$lang_string['folder_exists'] = "Okay! Folder already exists. No changes made...";
				$lang_string['folder_failed'] = "Whoops! Could not create folder...";
				$lang_string['folder_success'] = "Success! Folder created...";
				// Help
				$lang_string['help'] = "
				<h2>Whoops!</h2>
				Could not create one or more folders! This is most likely due to:<br>
				<i>1) <b>Write Permissions</b> aren't set to allow <b>Read/Write</b> access.</i><br>
				<i>2) The <b>UID</b>'s (user ID's) of all files and folder must match.</i><p />
				
				Follow the trouble-shooting instructions below and please try again:<p />				
				1) Manually create the following folders: <b>config</b>, <b>content</b>, and <b>images</b>.<p />
				2) Enabled <b>Write Permissions</b> on the folders. In your FTP program, Owner, User, and World should have <b>Read</b> and <b>Write</b> access. <i>(You may need to contact your service provider to change these...)</i><p />
				3) Make sure the UID's of all your files and folders are the same. <i>(You may need to contact your service provider to change these...)</i>";
				$lang_string['try_again'] = "[ Try Again ]";
				// Success
				$lang_string['success'] = "<h2>Success!</h2>Folders created successfully!<p /><b>Click below to continue:</b>";
				$lang_string['continue'] = "[ Continue ]";
				break;
			case 'install03': // <-- New
				$lang_string['title'] = "Create Username &amp; Password";
				$lang_string['instructions'] = "Use the form below to Create a Username and Password.";
				$lang_string['username'] = "Username:";
				$lang_string['password'] = "Password:";
				$lang_string['submit_btn'] = "&nbsp;Submit&nbsp;";
				// Success
				$lang_string['success'] = "<h2>Congratulations!</h2>You are now logged in. Click below to visit the Setup page, where you can name your blog. Happy blogging!<p />";
				$lang_string['btn_setup'] = "[ Setup ]";
				// Wrong Password
				$lang_string['wrong_password'] = "<h2>Whoops!</h2>Information not saved. I ran into a problem while saving your Username and/or Password.<br /><br />Server Reported:<br />";
				$lang_string['form_error'] = "Please complete the Username and Password fields.";
				break;
			case 'setup':
				$lang_string['title'] = "���������";
				$lang_string['instructions'] = "����� �� ������� �������� �������� ������ �����/��������� � ��������� ������������ ����������.";
				$lang_string['blog_title'] = "�������� ���������:";
				$lang_string['blog_author'] = "�����:";
				$lang_string['blog_email'] = "Email:"; // <-- New 0.3.7
				$lang_string['blog_footer'] = "������:";
				$lang_string['blog_choose_language'] = "�������� ����:";
				$lang_string['blog_enable_comments'] = "Enable User Comments"; // <-- New 0.3.6
				$lang_string['blog_comments_popup'] = "Open Comments in Popup Window"; // <-- New 0.3.6
				$lang_string['blog_enable_voting'] = "Enable Users to Rate Entries"; // <-- New 0.3.8
				$lang_string['blog_email_notification'] = "Send email notification when comments are posted"; // <-- New 0.3.7
				$lang_string['blog_send_pings'] = "Send weblog &quot;pings&quot;"; // <-- New 0.3.7
				$lang_string['blog_ping_urls'] = "Enter full URL (i.e. http://rpc.weblogs.com/RPC2) of service to &quot;ping&quot;.<br />(You can enter more than one address separated by commas.)"; // <-- New 0.3.7
				$lang_string['blog_trackback_about'] = "Trackback provides a method of notification between blogs. Let another
					blog know that you are linking to them by sending them a trackback ping. See who is linking to 
					your blog by receiving trackback pings.<br />
				   You can either enter the URIs to ping manually, or try to do it automatically through 
				   Auto-Discovery."; // <-- New 0.3.8
				$lang_string['blog_trackback_enabled'] = "Enable trackback in my blog"; // <-- New 0.3.8
				$lang_string['blog_trackback_auto_discovery'] = "Enable Auto-Discovery when submitting a post containing URLs"; // <-- New 0.?.?
				$lang_string['blog_max_entries'] = "Maximum Entries to Display:"; // <-- New 0.3.6
				$lang_string['blog_comment_tags'] = "Tags to Allow in Comments:"; // <-- New 0.3.6
				$lang_string['blog_gzip_about'] = "
					Since PHP 4.0.4, PHP has had the ability to read and write gzip (.gz) compressed files, 
					thus saving disk-space. It can also transparently compress pages that are sent to browsers 
					which support gzip compression, thus saving bandwidth.<br />
					<br />
					Zlib support in PHP is not enabled by default. If the checkboxes are disabled, then your 
					installation of PHP does not support the Zlib extension."; // <-- New 0.3.7
				$lang_string['blog_enable_gzip_txt'] = "Enable GZIP Compression for Database Files"; // <-- New 0.3.7
				$lang_string['blog_enable_gzip_output'] = "Enable GZIP Compression for HTTP Output"; // <-- New 0.3.7
				$lang_string['submit_btn'] = "&nbsp;���������&nbsp;";
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>���������� �� ����� ���� ���������. ��� ������� ���������� ��������� ������.<br /><br />����� �������:<br />";
				$lang_string['form_error'] = "����������, ������� �������� � ������.";
				$lang_string['label_entry_order'] = "������� ����������� ������:";
				$lang_string['select_new_to_old'] = "����� �������";
				$lang_string['select_old_to_new'] = "����� ����������";
				$lang_string['label_comment_order'] = "������� ����������� ������������:";
				break;
			case 'trackbacks':  // <-- New 0.3.8
				// Trackbacks
				$lang_string['title'] = "Trackbacks";
				$lang_string['header'] = "Trackback URL for this entry:";
				$lang_string['delete_btn'] = "delete";
				// Error Response
				$lang_string['error_add'] = "Error storing trackback data.";
				break;
			case 'options':
				$lang_string['title'] = "���������";
				$lang_string['instructions'] = "��������� ��������� ����������� ���� � �������. ���� <strong>��������������� ��������</strong> ������������� ����������� ��� ��������� ������-���� ���������.";
				// Long Date
				$lang_string['ldate_title'] = "������� ������ ����:";
				$lang_string['weekday'] = "���� ������";
				$lang_string['month'] = "�����";
				$lang_string['day'] = "����";
				$lang_string['year'] = "���";
				$lang_string['none'] = "�����";
				// Short Date
				$lang_string['sdate_title'] = "�������� ������ ����:";
				$lang_string['s_month'] = "�����";
				$lang_string['s_mon'] = "MMM";
				$lang_string['s_day'] = "����";
				$lang_string['s_year'] = "���";
				$lang_string['zero_day'] = "01 ������ 1";
				$lang_string['show_century'] = "Show century";
				// Time
				$lang_string['time_title'] = "������ �������:";
				$lang_string['12hour'] = "12-������� ������";
				$lang_string['24hour'] = "24-������� ������";
				$lang_string['before_noon'] = "�� �������";
				$lang_string['after_noon'] = "����� �������";
				// Date
				$lang_string['date_title'] = "������ �����������:";
				$lang_string['long_date'] = "������� ����";
				$lang_string['short_date'] = "�������� ����";
				$lang_string['time'] = "�����";
				// Menu
				$lang_string['menu_title'] = "Menu Date Display Format:";
				$lang_string['long_date'] = "Long Date";
				$lang_string['short_date'] = "Short Date";
				// Used in multiple places
				$lang_string['zero_day'] = "01 ������ 1 ��� ���";
				$lang_string['zero_month'] = "01 ������ 1 ��� ��� ������";
				$lang_string['zero_hour'] = "01 ������ 1 ��� ����";
				$lang_string['separator'] = "�����������:";
				$lang_string['preview'] = "��������������� ��������:";
				$lang_string['server_offset'] = "Server Offset:";
				// Buttons
				$lang_string['submit_btn'] = "&nbsp;���������&nbsp;";
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>��� ���������� ���������� �������� ������. ��������� �� ���������.<br /><br />����� �������:<br />";
				break;
			case 'themes':
				$lang_string['title'] = "Themes";
				$lang_string['instructions'] = "Use the drop-down menu to select a different theme.";
				// Themes
				$lang_string['choose_theme'] = "Themes:";
				// Buttons
				$lang_string['submit_btn'] = "&nbsp;Submit&nbsp;";
				// Error Response
				$lang_string['error'] = "<h2>Whoops!</h2>Information not saved. I ran into a problem while saving your information.<br /><br />Server Reported:<br />";
				break;
			case 'upload_img':
				$lang_string['title'] = "������� ��������";
				$lang_string['instructions'] = "������� ������ '�����' ����� ������� �������� �� ��������� �����.";
				$lang_string['select_file'] = "�������� ����:";
				$lang_string['upload_btn'] = "��������";
				// Error Response
				$lang_string['error'] = "<h2>���!</h2>��� ������� ����������� �������� ��������� ������. ��������� ����������:<br /><br />����� �������:<br />";
				break;
			case 'search': // <-- New 0.3.7
				$lang_string['title'] = "Search Results";
				$lang_string['instructions'] = "Search results for <b>%string</b>:";
				$lang_string['not_found'] = "No results found";
				break;
			case 'contact': // <-- New 0.3.8
				$lang_string['title'] = "Contact Me";
				$lang_string['instructions'] = "Fill in the form:";
				$lang_string['form_error'] = "Please complete the Subject and Comment fields.";
				$lang_string['name'] = "Name:";
				$lang_string['email'] = "Email:";
				$lang_string['subject'] = "Subject:";
				$lang_string['comment'] = "Comment:";
				$lang_string['submit_btn'] = "&nbsp;Submit&nbsp;";
				$lang_string['success'] = "<h2>Success!</h2>Your message has been sent.<p />";
				break;
			case 'stats':
				$lang_string['title'] = "<h2>Statistics</h2>";
				$lang_string['general'] = "<h3>General</h3>";
				$lang_string['entry_info'] = "<b>%s</b> entries using <b>%s</b> words stored in <b>%s</b> bytes";
				$lang_string['comment_info'] = "<b>%s</b> comments using <b>%s</b> words stored in <b>%s</b> bytes";
				$lang_string['trackback_info'] = "<b>%s</b> trackbacks stored in <b>%s</b> bytes";
				$lang_string['static_info'] = "<b>%s</b> static pages using <b>%s</b> words stored in <b>%s</b> bytes";
				$lang_string['most_viewed_entries'] = "<h3>10 Most viewed entries</h3>";
				$lang_string['most_commented_entries'] = "<h3>10 Most commented entries</h3>";
				$lang_string['most_trackbacked_entries'] = "<h3>10 Most trackbacked entries</h3>";
				break;
			default:
				break;
		}

	}
		
?>