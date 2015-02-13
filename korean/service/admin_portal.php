<?php
/***************************************************************************
 *                              admin_portal.php
 *                            -------------------
 *   begin                : Wednesday, Dec 25, 2002
 *   copyright            : (C) 2002 ThunderCat
 *   email                : thundercat@die-pretorianer.de
 *
 *   $Id: admin_portal.php,v 1.01.0.0 2002/12/25 00:00:00 psotfx Exp $
 *
 *
 ***************************************************************************/

define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['Portal']['Configuration'] = "$file?mode=config";
	return;
}

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

define('PORTAL_TABLE', $table_prefix.'portal');

//
// Pull all config data
//
$sql = "SELECT * FROM " . PORTAL_TABLE;
if(!$result = $db->sql_query($sql))
{
	message_die(CRITICAL_ERROR, "Could not query config information in admin_portal", "", __LINE__, __FILE__, $sql);
}
else
{
	while( $row = $db->sql_fetchrow($result) )
	{
		$portal_name = $row['portal_name'];
		$portal_value = $row['portal_value'];
		$default_portal[$portal_name] = $portal_value;
		
		$new[$portal_name] = ( isset($HTTP_POST_VARS[$portal_name]) ) ? $HTTP_POST_VARS[$portal_name] : $default_portal[$portal_name];
		if( isset($HTTP_POST_VARS['submit']) )
		{
			$sql = "UPDATE " . PORTAL_TABLE . " SET
				portal_value = '" . str_replace("\'", "''", $new[$portal_name]) . "'
				WHERE portal_name = '$portal_name'";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Failed to update general configuration for $portal_name", "", __LINE__, __FILE__, $sql);
			}
		}
	}

	if( isset($HTTP_POST_VARS['submit']) )
	{
		$message = $lang['Config_updated'] . "<br /><br />" . sprintf($lang['Click_return_config'], "<a href=\"" . append_sid("admin_portal.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

		message_die(GENERAL_MESSAGE, $message);
	}
}

$template->set_filenames(array(
	"body" => "service/portal_config_body.tpl")
);

$popup_board_yes = ( $new['popup_board_use'] ) ? "checked=\"checked\"" : "";
$popup_board_no = ( !$new['popup_board_use'] ) ? "checked=\"checked\"" : "";

$template->assign_vars(array(
	"S_CONFIG_ACTION" => append_sid("admin_portal.$phpEx"),
	"L_CONFIGURATION_TITLE" => $lang['EZPortal_Config'],
	"L_GENERAL_SETTINGS" => $lang['EZPortal_settings'],
	"L_WELCOME_TEXT" => $lang['Welcome_Text'],
	"L_HTML_AREA" => $lang['Html_areal'],
	"L_NUMBER_OF_NEWS" => $lang['Number_of_News'],
	"L_NEWS_LENGTH" => $lang['News_length'],
	"L_NEWS_FORUM" => $lang['News_Forum'],
	"L_POLL_FORUM" => $lang['Poll_Forum'],	
	"L_NUMBER_RECENT_TOPICS" => $lang['Number_Recent_Topics'],
	"L_EXCEPTIONAL_FORUMS" => $lang['Exceptional_forums'],
	"L_LAST_SEEN" => $lang['Last_Seen'],
	"L_SUBMIT" => $lang['Submit'], 
	"L_RESET" => $lang['Reset'], 
	"L_SHOW" => $lang['Portal_Show'],
	"L_HIDE" => $lang['Portal_Hide'],
    "L_COMMA" => $lang['Comma'],
    "L_ALBUM_CAT" => $lang['Album_category'],

    "L_POPUP_BOARD" => $lang['popup_board'],
    "L_POPUP_HEIGHT" => $lang['popup_height'],
    "L_POPUP_WIDTH" => $lang['popup_width'],
    "L_POPUP_BOARD_USE" => $lang['popup_board_use'],
	"L_YES" => $lang['Yes'],
	"L_NO" => $lang['No'],

	"POPUP_BOARD" => $new['popup_board'],
	"POPUP_HEIGHT" => $new['popup_height'], 
	"POPUP_WIDTH" => $new['popup_width'],
	"POPUP_BOARD_YES" => $popup_board_yes,
	"POPUP_BOARD_NO" => $popup_board_no,

	"L_BANNER_FORUM" => $lang['Banner_board'],
	"BANNER_FORUM" => $new['banner_forum'],

	"WELCOME_TEXT" => $new['welcome_text'],
	"HTML_AREA" => $new['html_area'], 
	"NUMBER_OF_NEWS" => $new['number_of_news'],
	"NEWS_LENGTH" => $new['news_length'],
	"NEWS_FORUM" => $new['news_forum'],	
	"POLL_FORUM" => $new['poll_forum'],
	"NUMBER_RECENT_TOPICS" => $new['number_recent_topics'],
	"EXCEPTIONAL_FORUMS" => $new['exceptional_forums'],
	"PIC_CATEGORY" => $new['pic_category'])
);

$template->pparse("body");

include('./page_footer_admin.'.$phpEx);

?>

