
<h1>{L_CONFIGURATION_TITLE}</h1>

<p>{L_CONFIGURATION_EXPLAIN}</p>

<form action="{S_CONFIG_ACTION}" method="post"><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
	<tr>
	  <th class="thHead" colspan="2">{L_GENERAL_SETTINGS}</th>
	</tr>
	<tr>
		<td class="row1">{L_SERVER_NAME}</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="40" name="server_name" value="{SERVER_NAME}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SERVER_PORT}<br /><span class="gensmall">{L_SERVER_PORT_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" maxlength="5" size="5" name="server_port" value="{SERVER_PORT}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SCRIPT_PATH}<br /><span class="gensmall">{L_SCRIPT_PATH_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" maxlength="255" name="script_path" value="{SCRIPT_PATH}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SITE_NAME}<br /><span class="gensmall">{L_SITE_NAME_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="25" maxlength="100" name="sitename" value="{SITENAME}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SITE_DESCRIPTION}</td>
		<td class="row2"><input class="post" type="text" size="40" maxlength="255" name="site_desc" value="{SITE_DESCRIPTION}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_DISABLE_BOARD}<br /><span class="gensmall">{L_DISABLE_BOARD_EXPLAIN}</span></td>
		<td class="row2"><input class="formstyle3" type="radio" name="board_disable" value="1" {S_DISABLE_BOARD_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="board_disable" value="0" {S_DISABLE_BOARD_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_ACCT_ACTIVATION}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="require_activation" value="{ACTIVATION_NONE}" {ACTIVATION_NONE_CHECKED} />{L_NONE}&nbsp; &nbsp;<input class="formstyle3" type="radio" name="require_activation" value="{ACTIVATION_USER}" {ACTIVATION_USER_CHECKED} />{L_USER}&nbsp; &nbsp;<input class="formstyle3" type="radio" name="require_activation" value="{ACTIVATION_ADMIN}" {ACTIVATION_ADMIN_CHECKED} />{L_ADMIN}</td>
	</tr>
	<tr>
		<td class="row1">{L_VISUAL_CONFIRM}<br /><span class="gensmall">{L_VISUAL_CONFIRM_EXPLAIN}</span></td>
		<td class="row2"><input class="formstyle3" type="radio" name="enable_confirm" value="1" {CONFIRM_ENABLE} />{L_YES}&nbsp; &nbsp;<input class="formstyle3" type="radio" name="enable_confirm" value="0" {CONFIRM_DISABLE} />{L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_BOARD_EMAIL_FORM}<br /><span class="gensmall">{L_BOARD_EMAIL_FORM_EXPLAIN}</span></td>
		<td class="row2"><input class="formstyle3" type="radio" name="board_email_form" value="1" {BOARD_EMAIL_FORM_ENABLE} /> {L_ENABLED}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="board_email_form" value="0" {BOARD_EMAIL_FORM_DISABLE} /> {L_DISABLED}</td>
	</tr>
	<tr>
		<td class="row1">{L_FLOOD_INTERVAL} <br /><span class="gensmall">{L_FLOOD_INTERVAL_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="3" maxlength="10" name="flood_interval" value="{FLOOD_INTERVAL}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_TOPICS_PER_PAGE}</td>
		<td class="row2"><input class="post" type="text" name="topics_per_page" size="3" maxlength="4" value="{TOPICS_PER_PAGE}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_POSTS_PER_PAGE}</td>
		<td class="row2"><input class="post" type="text" name="posts_per_page" size="3" maxlength="4" value="{POSTS_PER_PAGE}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_HOT_THRESHOLD}</td>
		<td class="row2"><input class="post" type="text" name="hot_threshold" size="3" maxlength="4" value="{HOT_TOPIC}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_NEW_LENGTH}</td>
		<td class="row2"><input class="post" type="text" name="new_length" size="3" maxlength="4" value="{NEW_LENGTH}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_MOUSE_RIGHT}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="mouse_right" value="1" {MOUSE_RIGHT_ENABLE} />{L_YES}&nbsp; &nbsp;<input class="formstyle3" type="radio" name="mouse_right" value="0" {MOUSE_RIGHT_DISABLE} />{L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_PICS_PER_ROW}</td>
		<td class="row2"><input class="post" type="text" name="pics_per_row" size="3" maxlength="4" value="{PICS_PER_ROW}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SPECIAL_FORUM}</td>
		<td class="row2"><input class="post" type="text" name="special_forum" size="10" maxlength="30" value="{SPECIAL_FORUM}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_DEFAULT_STYLE}</td>
		<td class="row2">{STYLE_SELECT}</td>
	</tr>
	<tr>
		<td class="row1">{L_OVERRIDE_STYLE}<br /><span class="gensmall">{L_OVERRIDE_STYLE_EXPLAIN}</span></td>
		<td class="row2"><input class="formstyle3" type="radio" name="override_user_style" value="1" {OVERRIDE_STYLE_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="override_user_style" value="0" {OVERRIDE_STYLE_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_DEFAULT_LANGUAGE}</td>
		<td class="row2">{LANG_SELECT}</td>
	</tr>
	<tr>
		<td class="row1">{L_DATE_FORMAT}<br /><span class="gensmall">{L_DATE_FORMAT_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" name="default_dateformat" value="{DEFAULT_DATEFORMAT}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SYSTEM_TIMEZONE}</td>
		<td class="row2">{TIMEZONE_SELECT}</td>
	</tr>
	<tr>
		<td class="row1">{L_ENABLE_GZIP}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="gzip_compress" value="1" {GZIP_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="gzip_compress" value="0" {GZIP_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_ENABLE_PRUNE}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="prune_enable" value="1" {PRUNE_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="prune_enable" value="0" {PRUNE_NO} /> {L_NO}</td>
	</tr>

	<tr>
		<th class="thHead" colspan="2">{L_FIELD_CONF}</th>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_REALNAME}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_realname" value="0" {FIELD_REALNAME_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_realname" value="1" {FIELD_REALNAME_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_realname" value="2" {FIELD_REALNAME_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_JUMIN}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_jumin" value="0" {FIELD_JUMIN_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_jumin" value="1" {FIELD_JUMIN_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_jumin" value="2" {FIELD_JUMIN_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_MPHONE}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_mphone" value="0" {FIELD_MPHONE_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_mphone" value="1" {FIELD_MPHONE_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_mphone" value="2" {FIELD_MPHONE_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_HPHONE}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_hphone" value="0" {FIELD_HPHONE_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_hphone" value="1" {FIELD_HPHONE_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_hphone" value="2" {FIELD_HPHONE_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_GENDER}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_gender" value="0" {FIELD_GENDER_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_gender" value="1" {FIELD_GENDER_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_gender" value="2" {FIELD_GENDER_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_BIRTH}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_birth" value="0" {FIELD_BIRTH_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_birth" value="1" {FIELD_BIRTH_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_birth" value="2" {FIELD_BIRTH_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_FROM}</td>
		<td class="row2">
		 <input class="formstyle3" type="radio" name="use_from" value="0" {FIELD_FROM_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_from" value="1" {FIELD_FROM_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_from" value="2" {FIELD_FROM_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_FIELD_OCC}</td>
		<td class="row2">
		 <input class="formstyle3" type="radio" name="use_occ" value="0" {FIELD_OCC_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_occ" value="1" {FIELD_OCC_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_occ" value="2" {FIELD_OCC_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>

	<tr>
		<td class="row1">{L_REMARK1}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_remark1" value="0" {FIELD_REMARK1_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark1" value="1" {FIELD_REMARK1_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark1" value="2" {FIELD_REMARK1_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_REMARK2}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_remark2" value="0" {FIELD_REMARK2_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark2" value="1" {FIELD_REMARK2_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark2" value="2" {FIELD_REMARK2_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_REMARK3}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_remark3" value="0" {FIELD_REMARK3_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark3" value="1" {FIELD_REMARK3_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark3" value="2" {FIELD_REMARK3_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_REMARK4}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_remark4" value="0" {FIELD_REMARK4_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark4" value="1" {FIELD_REMARK4_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark4" value="2" {FIELD_REMARK4_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>
	<tr>
		<td class="row1">{L_REMARK5}</td>
		<td class="row2">
         <input class="formstyle3" type="radio" name="use_remark5" value="0" {FIELD_REMARK5_OFF} /> {L_FIELD_USE_OFF}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark5" value="1" {FIELD_REMARK5_ON} /> {L_FIELD_USE_ON}&nbsp;&nbsp;
         <input class="formstyle3" type="radio" name="use_remark5" value="2" {FIELD_REMARK5_REQ} /> {L_FIELD_USE_REQ}</td>
	</tr>



	<tr>
		<th class="thHead" colspan="2">Global Variables</th>
	</tr>
	<tr>
		<td class="row1" align=right>Remark1</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark1" value="{REMARK1}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark2</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark2" value="{REMARK2}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark3</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark3" value="{REMARK3}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark4</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark4" value="{REMARK4}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark5</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark5" value="{REMARK5}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark6</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark6" value="{REMARK6}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark7</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark7" value="{REMARK7}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark8</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark8" value="{REMARK8}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark9</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark9" value="{REMARK9}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark10</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark10" value="{REMARK10}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark11</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark11" value="{REMARK11}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark12</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark12" value="{REMARK12}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark13</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark13" value="{REMARK13}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark14</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark14" value="{REMARK14}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark15</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark15" value="{REMARK15}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark16</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark16" value="{REMARK16}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark17</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark17" value="{REMARK17}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark18</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark18" value="{REMARK18}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark19</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark19" value="{REMARK19}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark20</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark20" value="{REMARK20}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark21</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark21" value="{REMARK21}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark22</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark22" value="{REMARK22}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark23</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark23" value="{REMARK23}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark24</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark24" value="{REMARK24}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark25</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark25" value="{REMARK25}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark26</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark26" value="{REMARK26}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark27</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark27" value="{REMARK27}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark28</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark28" value="{REMARK28}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark29</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark29" value="{REMARK29}" /></td>
	</tr>
	<tr>
		<td class="row1" align=right>Remark30</td>
		<td class="row2"><input class="post" type="text" maxlength="255" size="30" name="remark30" value="{REMARK30}" /></td>
	</tr>

	<tr>
		<th class="thHead" colspan="2">{L_COOKIE_SETTINGS}</th>
	</tr>
	<tr>
		<td class="row2" colspan="2"><span class="gensmall">{L_COOKIE_SETTINGS_EXPLAIN}</span></td>
	</tr>
	<tr>
		<td class="row1">{L_COOKIE_DOMAIN}</td>
		<td class="row2"><input class="post" type="text" maxlength="255" name="cookie_domain" value="{COOKIE_DOMAIN}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_COOKIE_NAME}</td>
		<td class="row2"><input class="post" type="text" maxlength="16" name="cookie_name" value="{COOKIE_NAME}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_COOKIE_PATH}</td>
		<td class="row2"><input class="post" type="text" maxlength="255" name="cookie_path" value="{COOKIE_PATH}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_COOKIE_SECURE}<br /><span class="gensmall">{L_COOKIE_SECURE_EXPLAIN}</span></td>
		<td class="row2"><input class="formstyle3" type="radio" name="cookie_secure" value="0" {S_COOKIE_SECURE_DISABLED} />{L_DISABLED}&nbsp; &nbsp;<input class="formstyle3" type="radio" name="cookie_secure" value="1" {S_COOKIE_SECURE_ENABLED} />{L_ENABLED}</td>
	</tr>
	<tr>
		<td class="row1">{L_SESSION_LENGTH}</td>
		<td class="row2"><input class="post" type="text" maxlength="5" size="5" name="session_length" value="{SESSION_LENGTH}" /></td>
	</tr>
	<tr>
		<th class="thHead" colspan="2">{L_PRIVATE_MESSAGING}</th>
	</tr>
	<tr>
		<td class="row1">{L_DISABLE_PRIVATE_MESSAGING}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="privmsg_disable" value="0" {S_PRIVMSG_ENABLED} />{L_ENABLED}&nbsp; &nbsp;<input class="formstyle3" type="radio" name="privmsg_disable" value="1" {S_PRIVMSG_DISABLED} />{L_DISABLED}</td>
	</tr>
	<tr>
		<td class="row1">{L_INBOX_LIMIT}</td>
		<td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_inbox_privmsgs" value="{INBOX_LIMIT}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SENTBOX_LIMIT}</td>
		<td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_sentbox_privmsgs" value="{SENTBOX_LIMIT}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SAVEBOX_LIMIT}</td>
		<td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_savebox_privmsgs" value="{SAVEBOX_LIMIT}" /></td>
	</tr>
	<tr>
	  <th class="thHead" colspan="2">{L_ABILITIES_SETTINGS}</th>
	</tr>
	<tr>
		<td class="row1">{L_MAX_POLL_OPTIONS}</td>
		<td class="row2"><input class="post" type="text" name="max_poll_options" size="4" maxlength="4" value="{MAX_POLL_OPTIONS}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_HTML}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_html" value="1" {HTML_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_html" value="0" {HTML_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOWED_TAGS}<br /><span class="gensmall">{L_ALLOWED_TAGS_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="30" maxlength="255" name="allow_html_tags" value="{HTML_TAGS}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_BBCODE}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_bbcode" value="1" {BBCODE_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_bbcode" value="0" {BBCODE_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_SMILIES}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_smilies" value="1" {SMILE_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_smilies" value="0" {SMILE_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_SMILIES_PATH} <br /><span class="gensmall">{L_SMILIES_PATH_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="20" maxlength="255" name="smilies_path" value="{SMILIES_PATH}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_SIG}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_sig" value="1" {SIG_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_sig" value="0" {SIG_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_MAX_SIG_LENGTH}<br /><span class="gensmall">{L_MAX_SIG_LENGTH_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="5" maxlength="4" name="max_sig_chars" value="{SIG_SIZE}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_NAME_CHANGE}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_namechange" value="1" {NAMECHANGE_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_namechange" value="0" {NAMECHANGE_NO} /> {L_NO}</td>
	</tr>
	<tr>
	  <th class="thHead" colspan="2">{L_AVATAR_SETTINGS}</th>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_LOCAL}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_avatar_local" value="1" {AVATARS_LOCAL_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_avatar_local" value="0" {AVATARS_LOCAL_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_REMOTE} <br /><span class="gensmall">{L_ALLOW_REMOTE_EXPLAIN}</span></td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_avatar_remote" value="1" {AVATARS_REMOTE_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_avatar_remote" value="0" {AVATARS_REMOTE_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_ALLOW_UPLOAD}</td>
		<td class="row2"><input class="formstyle3" type="radio" name="allow_avatar_upload" value="1" {AVATARS_UPLOAD_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="allow_avatar_upload" value="0" {AVATARS_UPLOAD_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_MAX_FILESIZE}<br /><span class="gensmall">{L_MAX_FILESIZE_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="4" maxlength="10" name="avatar_filesize" value="{AVATAR_FILESIZE}" /> Bytes</td>
	</tr>
	<tr>
		<td class="row1">{L_MAX_AVATAR_SIZE} <br />
			<span class="gensmall">{L_MAX_AVATAR_SIZE_EXPLAIN}</span>
		</td>
		<td class="row2"><input class="post" type="text" size="3" maxlength="4" name="avatar_max_height" value="{AVATAR_MAX_HEIGHT}" /> x <input class="post" type="text" size="3" maxlength="4" name="avatar_max_width" value="{AVATAR_MAX_WIDTH}"></td>
	</tr>
	<tr>
		<td class="row1">{L_AVATAR_STORAGE_PATH} <br /><span class="gensmall">{L_AVATAR_STORAGE_PATH_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="20" maxlength="255" name="avatar_path" value="{AVATAR_PATH}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_AVATAR_GALLERY_PATH} <br /><span class="gensmall">{L_AVATAR_GALLERY_PATH_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" size="20" maxlength="255" name="avatar_gallery_path" value="{AVATAR_GALLERY_PATH}" /></td>
	</tr>
	<tr>
	  <th class="thHead" colspan="2">{L_COPPA_SETTINGS}</th>
	</tr>
	<tr>
		<td class="row1">{L_COPPA_FAX}</td>
		<td class="row2"><input class="post" type="text" size="25" maxlength="100" name="coppa_fax" value="{COPPA_FAX}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_COPPA_MAIL}<br /><span class="gensmall">{L_COPPA_MAIL_EXPLAIN}</span></td>
		<td class="row2"><textarea name="coppa_mail" rows="5" cols="30">{COPPA_MAIL}</textarea></td>
	</tr>

	<tr>
	  <th class="thHead" colspan="2">{L_EMAIL_SETTINGS}</th>
	</tr>
	<tr>
		<td class="row1">{L_ADMIN_EMAIL}</td>
		<td class="row2"><input class="post" type="text" size="25" maxlength="100" name="board_email" value="{EMAIL_FROM}" /></td>
	</tr>
	<tr>
		<td class="row1">{L_EMAIL_SIG}<br /><span class="gensmall">{L_EMAIL_SIG_EXPLAIN}</span></td>
		<td class="row2"><textarea name="board_email_sig" rows="5" cols="30">{EMAIL_SIG}</textarea></td>
	</tr>
	<tr>
		<td class="row1">{L_USE_SMTP}<br /><span class="gensmall">{L_USE_SMTP_EXPLAIN}</span></td>
		<td class="row2"><input class="formstyle3" type="radio" name="smtp_delivery" value="1" {SMTP_YES} /> {L_YES}&nbsp;&nbsp;<input class="formstyle3" type="radio" name="smtp_delivery" value="0" {SMTP_NO} /> {L_NO}</td>
	</tr>
	<tr>
		<td class="row1">{L_SMTP_SERVER}</td>
		<td class="row2"><input class="post" type="text" name="smtp_host" value="{SMTP_HOST}" size="25" maxlength="50" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SMTP_USERNAME}<br /><span class="gensmall">{L_SMTP_USERNAME_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="text" name="smtp_username" value="{SMTP_USERNAME}" size="25" maxlength="255" /></td>
	</tr>
	<tr>
		<td class="row1">{L_SMTP_PASSWORD}<br /><span class="gensmall">{L_SMTP_PASSWORD_EXPLAIN}</span></td>
		<td class="row2"><input class="post" type="password" name="smtp_password" value="{SMTP_PASSWORD}" size="25" maxlength="255" /></td>
	</tr>
	<tr>
		<td class="catBottom" colspan="2" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="liteoption" />
		</td>
	</tr>
</table></form>

<br clear="all" />
