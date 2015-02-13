<? 

$index = "https://hedc.handong.edu:40006/english/portal.php"; 

$accept_lang_list = explode(',', $HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE']);

if( preg_match('#' . 'ko([_-][a-z]+)?' . '#i', trim($accept_lang_list[0]))){ $index = "https://hedc.handong.edu:40006/korean/portal.php"; } 

header( "Location: $index" ); 

?>