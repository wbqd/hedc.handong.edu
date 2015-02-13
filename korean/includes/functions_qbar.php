<?php

/***************************************************************************
 *                            functions_qbar.php
 *                            ------------------
 *	begin			: 22/07/2003
 *	copyright		: Ptirhiik
 *	email			: admin@rpgnet-fr.com
 *	version			: 1.0.4 - 28/07/2003
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

// client field functions
function qbar_get_icon($icon)
{
	global $images;
	return empty($icon) ? '' : ((isset($images[$icon])) ? '<img src="' . '../' . $images[$icon] . '" border="0" alt="' . $icon . '" align="absbottom" />' : '<img src="' . $icon . '" border="0" alt="' . $icon . '" />');
}
function qbar_get_value($lang_key)
{
	global $lang;
	return empty($lang_key) ? '' : ((isset($lang[$lang_key])) ? $lang[$lang_key] . '&nbsp;('. $lang_key . ')' : $lang_key);
}
function qbar_get_bool($value)
{
	global $lang;
	return (empty($value) || !$value) ? $lang['No'] : $lang['Yes'];
}
function qbar_get_auth($auth, $pm=false)
{
	global $lang;

	$res = '';
	switch (intval($auth))
	{
		case 1 :
			$res = ($pm) ? $lang['Qbar_auth_pm_new'] : $lang['Qbar_auth_required'];
			break;
		case 2 :
			$res = ($pm) ? $lang['Qbar_auth_pm_no_new'] : $lang['Qbar_auth_prohibited'];
			break;
		case 3 :
			$res = ($pm) ? $lang['Qbar_auth_pm_unread'] : $lang['Qbar_auth_ignore'];
			break;
		default :
			$res = $lang['Qbar_auth_ignore'];
			break;
	}
	return $res;
}
function qbar_get_tree_title($cur)
{
	global $lang, $tree;
	$res = '';
	if (!empty($cur))
	{
		$this = isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1;
		if ($cur == 'Root')
		{
			$res = qbar_get_value('Forum_index');
		}
		else if ($this > -1)
		{
			$res = qbar_get_value( (($tree['type'][$this] == POST_CAT_URL) ? $tree['data'][$this]['cat_title'] : $tree['data'][$this]['forum_name'] ) );
		}
		else
		{
			$res = '??';
		}
	}
	return $res;
}

// list of style
function qbar_style_select($select)
{
	global $db, $lang;

	$sql = "SELECT themes_id, style_name
		FROM " . THEMES_TABLE . "
		ORDER BY template_name, themes_id";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't query themes table", "", __LINE__, __FILE__, $sql);
	}

	// default value
	$selected = ( empty($select) || ($select == 0)) ? ' selected="selected"' : '';
	$res = '<option value="0"' . $selected . '>' . $lang['Qbar_none'] . '</option>';

	// other values
	while ( $row = $db->sql_fetchrow($result) )
	{
		$selected = ($select == $row['themes_id']) ? ' selected="selected"' : '';
		$res .= '<option value="' . $row['themes_id'] . '"' . $selected . '>' . $row['style_name'] . '</option>';
	}

	// get the result
	$res = '<select name="panel_style">' . $res . '</select>';

	return $res;
}
//
function qbar_get_style($style)
{
	global $db, $lang;

	$res = '';
	if (!empty($style))
	{
		$sql = "SELECT * FROM " . THEMES_TABLE . " WHERE themes_id=$style";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Couldn't query themes table", "", __LINE__, __FILE__, $sql);
		}
		if ($row = $db->sql_fetchrow($result))
		{
			$res = '[ ' . $row['style_name'] . ' ]';
		}
	}
	return $res;
}

// list of sub-templates
function qbar_sub_template_select($style, $select)
{
	global $db, $lang;

	// init
	$res = '';

	// something to select ?
	if (empty($style)) return $res;

	// get the style dir
	$sql = "SELECT * FROM " . THEMES_TABLE . " WHERE themes_id=$style";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't query themes table", "", __LINE__, __FILE__, $sql);
	}
	if (!$row = $db->sql_fetchrow($result)) return $res;

	// read the sub_templates.cfg file
	$filename = './../templates/' . $row['style_name'] . '/sub_templates.cfg';
	@include($filename);
	if (empty($sub_templates)) return $res;

	// get each sub-templates
	@reset($sub_templates);
	$subtpl = array();
	while (list($key, $value) = each($sub_templates))
	{
		if (!in_array($value['name'], $subtpl))
		{
			$subtpl[] = $value['name'];
		}
	}

	// default values
	$selected = empty($select) ? ' selected="selected"' : '';
	$res .= '<option value=""' . $selected . '>' . $lang['Qbar_none'] . '</option>';

	// add the sub-templates
	ksort($subtpl);
	for ($i=0; $i < count($subtpl); $i++)
	{
		$selected = ($select == $subtpl[$i]) ? ' selected="selected"' : '';
		$res .= '<option value="' . $subtpl[$i] . '"' . $selected . '>' . $subtpl[$i] . '</option>';
	}

	// add *all
	$selected = ($select == '*ALL') ? ' selected="selected"' : '';
	$res .= '<option value="*ALL"' . $selected . '>' . $lang['Qbar_all'] . '</option>';

	// add the select row
	$res = '<select name="panel_sub_template">' . $res . '</select>';

	return $res;
}

// get the sub_template name
function qbar_get_sub_template($style, $sub_template)
{
	global $db, $lang;

	$res = '';
	if (isset($lang['Subtemplate']))
	{
		if (!empty($style) && !empty($sub_template))
		{
			$res = '[ ' . $sub_template . ' ]';
		}
	}
	return $res;
}

// fix the sub_template name
function qbar_fix_sub_template($style, $sub_template)
{
	global $db, $lang;

	// init
	$res = '';

	// something to select ?
	if (empty($style)) return $res;

	// blank
	if (empty($sub_template)) return $res;

	// *all
	if ($sub_template == '*ALL') return $sub_template;

	// get the style dir
	$sql = "SELECT * FROM " . THEMES_TABLE . " WHERE themes_id=$style";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't query themes table", "", __LINE__, __FILE__, $sql);
	}
	if (!$row = $db->sql_fetchrow($result)) return $res;

	// read the sub_templates.cfg file
	$filename = './../templates/' . $row['style_name'] . '/sub_templates.cfg';
	@include($filename);
	if (empty($sub_templates)) return $res;

	// get each sub-templates
	@reset($sub_templates);
	$subtpl = array();
	while (list($key, $value) = each($sub_templates))
	{
		if (!in_array($value['name'], $subtpl))
		{
			$subtpl[] = $value['name'];
		}
	}

	// check
	if (in_array($sub_template, $subtpl))
	{
		$res = $sub_template;
	}

	return $res;
}

// get a specific image pack
function qbar_get_image_style($key, $row, $sub_template)
{
	global $board_config;

	// init result
	$res = $key;

	// get the base template image file
	$filename = './../templates/' . $row['style_name'] . '/' . $row['style_name'] . '.cfg';
	@include($filename);
	if (count($images) > 0)
	{
		// do we use a sub_template ?
		if (!empty($sub_template))
		{
			// get the main template image file
			$current_template_path = './../templates/' . $row['style_name'];
			@include($current_template_path . '/' . $row['style_name'] . '.cfg');
			$img_lang = ( file_exists($current_template_path . '/images/lang_' . $board_config['default_lang']) ) ? $board_config['default_lang'] : 'korean';
			@reset($images);
			while( list($key, $value) = @each($images) )
			{
				if ( !is_array($value) )
				{
					$images[$key] = str_replace('{LANG}', 'lang_' . $img_lang, $value);
				}
			}

			// get the sub-template config file
			$filename = './../templates/' . $row['style_name'] . '/sub_templates.cfg';
			@include($filename);
			if (count($sub_templates) > 0)
			{
				$found = false;
				while ((list($key, $data) = each($sub_templates)) && !$found)
				{
					$found = ($data['name'] == $sub_template);
					if ($found)
					{
						$fid = $key;
					}
				}
				if ($found)
				{
					// get the sub-template image file
					$current_template_path = './../templates/' . $row['style_name'] . '/' . $sub_templates[$fid]['dir'];
					@include($current_template_path . '/' . $sub_templates[$fid]['imagefile']);
					$img_lang = ( file_exists($current_template_path . '/images/lang_' . $board_config['default_lang']) ) ? $board_config['default_lang'] : 'korean';
					@reset($images);
					while( list($key, $value) = @each($images) )
					{
						if ( !is_array($value) )
						{
							$images[$key] = str_replace('{LANG}', 'lang_' . $img_lang, $value);
						}
					}
				}
			}
			// get the image
			if (isset($images[$res]))
			{
				$res = $images[$res];
			}
		}
	}
	return $res;
}

// get the good image
function qbar_image($key, $style, $sub_template)
{
	global $db, $images;

	$return = false;
	$res = $key;

	// no style, use the current one
	if (empty($style))
	{
		$return = true;
	}

	// get the style dir
	if (!$return)
	{
		$sql = "SELECT * FROM " . THEMES_TABLE . " WHERE themes_id=$style";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Couldn't query themes table", "", __LINE__, __FILE__, $sql);
		}

		// style not found, use current one
		if (!$row = $db->sql_fetchrow($result))
		{
			$return = true;
		}
	}

	// style found, get the specific image pack
	if (!$return)
	{
		$res = qbar_get_image_style($key, $row, $sub_template);
		if (empty($res))
		{
			$return = true;
		}
	}

	// return value
	if ($return)
	{
		$res = $key;
		if (isset($images[$res]))
		{
			$res = './../' . $images[$res];
		}
	}
	return $res;
}

// get tree
function qbar_set_tree_user_auth($cur='Root')
{
	global $board_config, $userdata, $lang;
	global $tree;

	$this = isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1;

	// auth
	$res = array();
	$res['auth_view'] = false;

	// get the info from forums
	if ( ($this > -1) && $tree['auth'][$cur]['auth_view'] )
	{
		$res['auth_view'] = $tree['auth'][$cur]['auth_view'];
	}

	// read sub-levels
	$count = count($tree['sub'][$cur]);
	for ($i=0; $i < $count; $i++)
	{
		// climb up the tree
		$res_sub = array();
		$res_sub = qbar_set_tree_user_auth($tree['sub'][$cur][$i]);

		// get the auth
		$res['auth_view'] = $res['auth_view'] || $res_sub['auth_view'];
	}

	// overide the level
	$tree['auth'][$cur]['tree.auth_view'] = $res['auth_view'];

	return $res;
}

function qbar_get_tree()
{
	global $db, $userdata;
	global $tree;

	if (!empty($tree)) return;

	// is categories hierarchy v 2 installed ?
	$cat_hierarchy = function_exists(get_auth_keys);

	// fill the tree
	if (!$cat_hierarchy)
	{
		$tree = array();

		// cats
		$sql = "SELECT * FROM " . CATEGORIES_TABLE . " ORDER BY cat_order, cat_title";
		if (!$result = $db->sql_query($sql)) message_die(GENERAL_ERROR, "Could not get categories informations !", "", __LINE__, __FILE__, $sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if ( !isset($row['cat_main']) ) $row['cat_main'] = 0;
			if ( $row['cat_main'] == $row['cat_id'] ) $row['cat_main'] = 0;
			$tree['keys'][ POST_CAT_URL . $row['cat_id'] ] = count($tree['data']);
			$tree['type'][] = POST_CAT_URL;
			$tree['id'][]	= $row['cat_id'];
			$tree['data'][] = $row;
			$main = ($row['cat_main']==0) ? 'Root' : POST_CAT_URL . $row['cat_main'];
			$tree['main'][] = $main;
			$tree['sub'][$main][] = POST_CAT_URL . $row['cat_id'];
		}

		// forums
		$sql = "SELECT * FROM " . FORUMS_TABLE . " ORDER BY forum_order, forum_name";
		if (!$result = $db->sql_query($sql)) message_die(GENERAL_ERROR, "Could not get forums informations !", "", __LINE__, __FILE__, $sql);
		while ($row = $db->sql_fetchrow($result)) 
		{
			$this = count($tree['data']);
			$tree['keys'][ POST_FORUM_URL . $row['forum_id'] ] = $this;
			$tree['type'][] = POST_FORUM_URL;
			$tree['id'][]	= $row['forum_id'];
			$tree['data'][] = $row;
			$main = POST_CAT_URL . $row['cat_id'];
			$tree['main'][] = $main;
			$tree['sub'][$main][] = POST_FORUM_URL . $row['forum_id'];
		}

		$tree['auth'] = array();
		$wauth = auth(AUTH_ALL, AUTH_LIST_ALL, $userdata);
		if (!empty($wauth))
		{
			reset($wauth);
			while (list($key, $data) = each($wauth))
			{
				$tree['auth'][POST_FORUM_URL . $key] = $data;
			}
		}

		// enhanced each level
		qbar_set_tree_user_auth();
	}
}

// in admin context, init cats and forums
function qbar_init_tree_list($cur='Root', $level = 0)
{
	global $qbar_maps, $phpEx;
	global $tree;

	if ($cur == 'Root')
	{
		qbar_get_tree();
	}

	// add the level
	if ($cur == 'Root')
	{
		$name	= 'Forum_index';
		$title	= 'Forum_index_explain';
		$icon	= 'menu_forums';
		$icon2	= 'menu_forums';
		$url	= 'index.' . $phpEx;
	}
	else if ($tree['type'][ $tree['keys'][$cur] ] == POST_CAT_URL)
	{
		$name	= $tree['data'][ $tree['keys'][$cur] ]['cat_title'];
		$title	= $tree['data'][ $tree['keys'][$cur] ]['cat_desc'];
		$icon	= 'menu_forums';
		$icon2	= 'menu_forums';
		$url	= 'index.' . $phpEx . '?' . POST_CAT_URL . '=' . $tree['id'][ $tree['keys'][$cur] ];
	}
	else if ($tree['type'][ $tree['keys'][$cur] ] == POST_FORUM_URL)
	{
		$name	= $tree['data'][ $tree['keys'][$cur] ]['forum_name'];
		$title	= $tree['data'][ $tree['keys'][$cur] ]['forum_desc'];
		$icon	= 'menu_forums';
		$icon2	= 'menu_forums';
		$url	= 'viewforum.' . $phpEx . '?' . POST_FORUM_URL . '=' . $tree['id'][ $tree['keys'][$cur] ];
	}
	else
	{
		$name	= $cur;
		$title	= 'Unknown';
		$icon	= 'menu_faq';
		$icon2	= 'menu_faq';
		$url	= 'index.' . $phpEx;
	}

	// init the row
	$row = array();
	$row['shortcut']		= $name;
	$row['explain']			= $title;
	$row['icon']			= $icon;
	$row['icon2']			= $icon2;
	$row['use_value']		= true;
	$row['use_icon']		= true;
	$row['url']				= $url;
	$row['internal']		= true;
	$row['auth_logged']		= 0;
	$row['auth_admin']		= 0;
	$row['auth_pm']			= 0;
	$row['tree_id']			= $cur;
	$row['level']			= $level;

	// store in definition
	$qbar_maps['default_tree']['fields'][$cur] = $row;

	// get the sub-levels
	for ($i = 0; $i < count($tree['sub'][$cur]); $i++ )
	{
		qbar_init_tree_list( $tree['sub'][$cur][$i], ($level+1) );
	}
}

function qbar_read_tree_options($select, $cur='Root', $level = -1)
{
	global $tree;

	$this = isset($tree['keys'][$cur]) ? $tree['keys'][$cur] : -1;

	// add the current option
	if ($cur == 'Root')
	{
		$value = 'Forum_index';
	}
	else if ($this >= -1)
	{
		switch ($tree['type'][$this])
		{
			case POST_CAT_URL:
				$value = $tree['data'][$this]['cat_title'];
				break;
			case POST_FORUM_URL:
				$value = $tree['data'][$this]['forum_name'];
				break;
			default:
				$value = '??';
				break;
		}
	}
	$value = (isset($lang[$value])) ? $lang[$value] : $value;

	// increment
	$inc = '';
	for ($k=1; $k <= $level; $k++)
	{
		$inc .= '|&nbsp;&nbsp;&nbsp;';
	}
	if ($level >=0) $inc .= '|--';
	$value = $inc . $value;

	// do the option
	$selected = ($select == $cur) ? ' selected="selected"' : '';
	$res = '<option value="' . $cur . '"' . $selected . '>' . $value . '</option>';

	// get sub-levels
	for ($i=0; $i < count($tree['sub'][$cur]); $i++)
	{
		$res .= qbar_read_tree_options($select, $tree['sub'][$cur][$i], ($level+1));
	}

	return $res;
}

function qbar_get_tree_options($select='')
{
	global $lang;
	global $tree;

	$res = '';

	// is categories hierarchy v 2 installed ?
	$cat_hierarchy = function_exists(get_auth_keys);

	if (!$cat_hierarchy)
	{
		$res = qbar_read_tree_options($select);
	}
	else
	{
		$res = get_tree_option($select,true,'Root');
	}

	// add None plus a blank line
	$value = 'Qbar_none';
	$value = (isset($lang[$value])) ? $lang[$value] : $value;
	$selected = ($select == '') ? ' selected="selected"' : '';
	$res = '<option value=""' . $selected . '>' . $value . '</option><option></option>' . $res;

	// add the field select
	$res = '<select name="tree_id">' . $res . '</select>';

	return $res;
}

function qbar_add_order()
{
	global $qbar_maps, $qbar_keys;

	@reset($qbar_maps);
	$qbar_keys = array();
	$qbar_order = 0;
	$i=0;
	while ( list($qbar_name, $qbar_data) = @each($qbar_maps) )
	{
		$i++;
		$qbar_order = $qbar_order + 10;
		if ($qbar_maps[$qbar_name]['class'] != 'System')
		{
			$qbar_maps[$qbar_name]['order'] = $qbar_order;
		}
		else
		{
			$qbar_maps[$qbar_name]['order'] = 99999999;
			$qbar_order = $qbar_order - 10;
		}
		$qbar_keys[$i][0] = $qbar_name;
		$qbar_maps[$qbar_name]['idx'] = $i;

		@reset($qbar_data['fields']);
		$fields_order = 0;
		$j=0;
		while (list($field_name, $field_data) = @each($qbar_data['fields']))
		{
			$j++;
			$fields_order = $fields_order + 10;
			$qbar_maps[$qbar_name]['fields'][$field_name]['order'] = $fields_order;
			$qbar_keys[$i][$j] = $field_name;
			$qbar_maps[$qbar_name]['fields'][$field_name]['idx'] = $j;
		}
	}
}

function qbar_sort()
{
	global $qbar_maps;

	@reset($qbar_maps);
	$qbars_order = array();
	$qbars_names = array();
	while ( list($qbar_name, $qbar_data) = @each($qbar_maps) )
	{
		$qbars_order[] = $qbar_data['order'];
		$qbars_names[] = $qbar_name;

		@reset($qbar_data['fields']);
		$fields_order = array();
		$fields_names = array();
		while (list($field_name, $field_data) = @each($qbar_data['fields']))
		{
			$fields_order[] = $field_data['order'];
			$fields_names[] = $field_name;
		}
		if (!empty($fields_names))
		{
			array_multisort($fields_order, $fields_names, $qbar_maps[$qbar_name]['fields']);
		}
	}
	if (!empty($qbars_names))
	{
		$qbar = array();
		$qbar = $qbar_maps;
		$qbar_maps = array();
		array_multisort($qbars_order, $qbars_names, $qbar);
		$qbar_maps = $qbar;
		$qbar = array();
	}
	qbar_add_order();
}

// read the qbars and enhance them with order
function qbar_read()
{
	global $phpbb_root_path, $phpEx;
	global $qbar_maps;
	
	$qbar_maps = array();
	include($phpbb_root_path . './includes/def_qbar.' . $phpEx);
	qbar_init_tree_list();
	qbar_add_order();
}

// write the qbars
function alpha($value)
{
	return sprintf("'%s'", addslashes($value));
}
function num($value)
{
	return sprintf("%d", intval($value));
}
function boolean($value)
{
	return ($value) ? 'true' : 'false';
}
function qbar_write()
{
	global $phpEx, $phpbb_root_path, $template;
	global $qbar_maps;

	// fields infos
	$map_field = array(
		'shortcut'		=> 'alpha',
		'alternate'		=> 'alpha',
		'explain'		=> 'alpha',
		'icon'			=> 'alpha',
		'icon2'			=> 'alpha',
		'use_value'		=> 'boolean',
		'use_icon'		=> 'boolean',
		'url'			=> 'alpha',
		'internal'		=> 'boolean',
		'auth_logged'	=> 'num',
		'auth_admin'	=> 'num',
		'auth_pm'		=> 'num',
		'tree_id'		=> 'alpha',
	);

	$template->set_filenames(array(
		'outfile' => 'qbar_def_qbar.tpl')
	);

	// process qbars
	@reset($qbar_maps);
	while ( list($qname, $qdata) = @each($qbar_maps))
	{
		if ($qname != 'default_tree')
		{
			$template->assign_block_vars('_outfile_qbar', array(
				'NAME'			=> alpha($qname),
				'CLASS'			=> alpha($qdata['class']),
				'DISPLAY'		=> boolean($qdata['display']),
				'CELLS'			=> num($qdata['cells']),
				'IN_TABLE'		=> boolean($qdata['in_table']),
				'STYLE'			=> num($qdata['style']),
				'SUB_TEMPLATE'	=> alpha($qdata['sub_template']),
				)
			);

			// process fields
			@reset($qdata['fields']);
			while ( list($fname, $fdata) = @each($qdata['fields']))
			{
				$template->assign_block_vars('_outfile_qbar.fields', array(
					'NAME'		=> alpha($fname),
					)
				);

				// dump values
				reset($map_field);
				while ( list($key, $type) = each($map_field) )
				{
					$val = $fdata[$key];
					if (!empty($val))
					{
						switch ($type)
						{
							case 'alpha'	: $val = alpha($val); break;
							case 'boolean'	: $val = boolean($val); break;
							case 'num'		: $val = num($val); break;
						}
						$spacer = '';
						if (strlen($key) <= 11)		$spacer .= '	';
						if (strlen($key) <= 8)		$spacer .= '	';
						if (strlen($key) <= 4)		$spacer .= '	';
						if (strlen($key) <= 1)		$spacer .= '	';

						$template->assign_block_vars('_outfile_qbar.fields.row', array(
							'FIELD'		=> alpha($key),
							'TABS'		=> $spacer,
							'VALUE'		=> $val,
							)
						);
					}
				}
			}
		}
	}

	// generate a var for the content
	$file_data = '_file_data';
	$template->assign_var_from_handle($file_data, 'outfile');
	$res = $template->_tpldata['.'][0][$file_data];

	// ouput to the profilcp/def_user_vlists.php
	$filename = phpbb_realpath($phpbb_root_path . 'includes/def_qbar.' . $phpEx);
	@CHMOD($filename, 0666);
	@unlink($filename);
	$f = @fopen($filename, 'w' );
	$texte  = "<?php\n$res\n?>";
	@fputs( $f, $texte );
	@ftruncate( $f );
	@fclose( $f );
}

// get nav description
function qbar_get_nav_desc($import=false)
{
	global $lang, $phpEx, $nav_separator;
	global $panel_id, $field_id, $qbar_maps, $qbar_keys;
	
	// nav separator
	if (empty($nav_separator)) $nav_separator = '&nbsp;->&nbsp;';

	// nav desc
	if ($import)
	{
		$s_nav_desc = '<input type="submit" name="goto[0]" class="liteoption" value="' . $lang['Qbar_admin'] . '" />';
	}
	else
	{
		$s_nav_desc = '<a href="' . append_sid("admin_qbar.$phpEx") . '" class="nav">' . $lang['Qbar_admin'] . '</a>';
	}

	$qname = '';
	if (!empty($panel_id))
	{
		// find the panel
		$qname = $qbar_keys[$panel_id][0];
		if (!empty($qname))
		{
			if ($import)
			{
				$s_nav_desc .= $nav_separator . '<input type="submit" name="goto[' . $panel_id . ']" class="liteoption" value="' . $qname . '" />';
			}
			else
			{
				$s_nav_desc .= $nav_separator . '<a href="' . append_sid("admin_qbar.$phpEx?panel=$panel_id") . '" class="nav">' . $qname . '</a>';
			}
		}
	}
	return $s_nav_desc;
}


function qbar_display_qbars($display=false)
{
	global $userdata, $lang, $images, $phpEx, $template, $db, $board_config;
	global $sub_template_key_image, $sub_templates, $theme;
	global $tree, $qbar_maps;
	global $main_menu_fields, $sub_menus,	$sub_menus_urls, $sub_menus_names, $sub_menus_keys;

	// get the tpl for displaying
	$template->set_filenames(array(
		'_qbars' => 'qbar_qbars.tpl')
	);

	if (!$display) return;
	qbar_read();

	// get number of messages
	$new_pms = intval($userdata['user_new_privmsg']);
	$unread_pms = intval($userdata['user_unread_privmsg']);

	// is categories hierarchy v 2 installed ?
	$cat_hierarchy = function_exists(get_auth_keys);

	// get the style used
	$style = $theme['themes_id'];

	// read the qbar to display
	$qbars = array();
	$qmenu = array();
	@reset($qbar_maps);
	while (list($qname, $qdata) = @each($qbar_maps))
	{
		$ok = ($qdata['display'] && ($qdata['class'] != 'System'));

		// check the main template
		if ($ok && !empty($qdata['style']) && ($qdata['style'] != $style))
		{
			$ok = false;
		}
		// no sub-template selected, but one in use
		if ( $ok && !empty($qdata['style']) && empty($qdata['sub_template']) && !empty($sub_templates[$sub_template_key_image]['name']) )
		{
			$ok = false;
		}
		// sub-template selected, and not all sub-template for the qbar
		if ($ok && !empty($qdata['style']) && !empty($qdata['sub_template']) && ($qdata['sub_template'] != '*ALL') && ($qdata['sub_template'] != $sub_templates[$sub_template_key_image]['name']))
		{
			$ok = false;
		}
		if ($ok)
		{
			// get the options
			$options = array();
			@reset($qdata['fields']);
			while( list($fname, $fdata) = @each($qdata['fields']))
			{				
				$ok = true;

				// check if logged
				if (($fdata['auth_logged'] == 1) && ($userdata['user_id'] == ANONYMOUS)) 
				{
					$ok = false;
				}
				if (($fdata['auth_logged'] == 2) && ($userdata['user_id'] != ANONYMOUS)) 
				{
					$ok = false;
				}

				// check if admin
				if (($fdata['auth_admin'] == 1) && ($userdata['user_level'] != ADMIN))
				{
					$ok = false;
				}
				if (($fdata['auth_admin'] == 2) && ($userdata['user_level'] == ADMIN))
				{
					$ok = false;
				}

				// check auth tree forum
				if (!empty($fdata['tree_id']) && $ok)
				{
					if (!$cat_hierarchy)
					{
						qbar_get_tree();
					}
					$ok = $tree['auth'][$fdata['tree_id']]['tree.auth_view'];
				}

				// check private messaging
				if (($fdata['auth_pm'] == 1) && ($new_pms <= 0))
				{
					$ok = false;
				}
				if (($fdata['auth_pm'] == 2) && ($unread_pms <= 0))
				{
					$ok = false;
				}
				if (($fdata['auth_pm'] == 2) && ($unread_pms > 0) && ($new_pms > 0))
				{
					$ok = false;
				}
				if (($fdata['auth_pm'] == 3) && (($new_pms > 0) || ($unread_pms > 0)))
				{
					$ok = false;
				}

				// all check
				if ($ok)
				{
					// shortcut
					$shortcut = $fdata['shortcut'];
					if ($fdata['shortcut'] == 'Logout')
					{
						$shortcut .= ' [ ' . $userdata['username'] . ' ]';
					}

					// alternate
					if ($fdata['auth_pm'] == 1)
					{
						if ($new_pms > 1)
						{
							$shortcut = isset($lang[ $fdata['alternate'] ]) ? $lang[ $fdata['alternate'] ] : $fdata['alternate'];
						}
						$shortcut = sprintf($shortcut, $new_pms);
					}
					if ($fdata['auth_pm'] == 2)
					{
						if ($unread_pms > 1)
						{
							$shortcut = isset($lang[ $fdata['alternate'] ]) ? $lang[ $fdata['alternate'] ] : $fdata['alternate'];
						}
						$shortcut = sprintf($shortcut, $unread_pms);
					}

					// mouseover
					$mouseover = $fdata['explain'];

					// link
					$url = $fdata['url'];
					if ($fdata['internal'])
					{
						$part = explode( '?', $url);
						$url .= ((count($part) > 1) ? '&' : '?') . 'sid=' . $userdata['session_id'];
						$url = append_sid($url);
					}

					// icon
					$icon = (isset($images[ $fdata['icon'] ])) ? $images[ $fdata['icon'] ] : $fdata['icon'];
					// icon2
					$icon2 = (isset($images[ $fdata['icon2'] ])) ? $images[ $fdata['icon2'] ] : $fdata['icon2'];

					// store the option
					$options['icon'][]			= ($fdata['use_icon']) ? $icon : '';
					$options['icon2'][]			= ($fdata['use_icon']) ? $icon2 : '';
					$options['shortcut'][]		= ($fdata['use_value']) ? $shortcut : '';
					$options['mouseover'][]		= $mouseover;
					$options['url'][]			= $url;
				}
			}

			// affect to the good place
			if (count($options['url']) > 0)
			{
				switch ($qdata['class'])
				{
					case 'Bar':
						$qbars['fields'][]			= $options;
						$qbars['in_table'][]		= $qdata['in_table'];
						$qbars['style'][]			= $qdata['style'];
						$qbars['sub_template'][]	= $qdata['sub_template'];
						$qbars['cells'][]			= $qdata['cells'];
						break;
					case 'Menu':
						$qmenu['fields'][]			= $options;
						$qmenu['in_table'][]		= $qdata['in_table'];
						$qmenu['style'][]			= $qdata['style'];
						$qmenu['sub_template'][]	= $qdata['sub_template'];
						$qmenu['cells'][]			= $qdata['cells'];
						break;
				}
			}
		}
	}

	// send qbars, then qmenus
	for ($obj = 0; $obj < 2; $obj++)
	{
		// the init of qbars tpl has already been done
		if ($obj > 0)
		{
			// display the qmenus
			$template->set_filenames(array(
				'_qmenus' => 'qbar_qmenus.tpl')
			);
		}

		// get the number of qbars/qmenus
		$obj_count = ($obj == 0) ? count($qbars['fields']) : count($qmenu['fields']);

		// display the object
		for ($i=0; $i < $obj_count; $i++)
		{
			$qbar_type = 0;

			if ($obj == 0)
			{
				// prepare the options array for this qbar
				$fields			= $qbars['fields'][$i];
				$in_table		= $qbars['in_table'][$i];
				$style			= $qbars['style'][$i];
				$sub_template	= $qbars['sub_template'][$i];
				$cells			= $qbars['cells'][$i];
				$qbar_type = 1;
			}
			else
			{
				$fields			= $qmenu['fields'][$i];
				$in_table		= $qmenu['in_table'][$i];
				$style			= $qmenu['style'][$i];
				$sub_template	= $qmenu['sub_template'][$i];
				$cells			= $qmenu['cells'][$i];
				$qbar_type = 2;
			}

			$options = array();
			$sub_menus = array();
			$sub_menus_urls = array();
			$sub_menus_names = array();
			$sub_menus_keys = array();
			$main_menu_fields = array();

			//print_r($fields);

			// process one qbar/qmenu
			for ($j=0; $j < count($fields['url']); $j++)
			{				
				$class = ($in_table) ? 'nav' : 'topmenu';
				if ($qbar_type == 1) //qbar
				{
					// link
					$wres = '<a href="' . $fields['url'][$j] . '" title="' . $fields['mouseover'][$j] . '" class="' . $class . '">%s</a>';

					// icon
					$icon = '';
					if (!empty($fields['icon'][$j]))
					{
						$icon	= '<img src="' . $fields['icon'][$j] . '" alt="' . $fields['mouseover'][$j] . '" align="absbottom" border="0"' . (empty($fields['shortcut'][$j]) ? '' : ' hspace="5"') . ' />';
					}
				}
				else { //qmenu
					// link
					$wres = '<a href="' . $fields['url'][$j] . '" OnMouseOut="na_restore_img_src(\'image'. $j .'\', \'document\')" OnMouseOver="na_change_img_src(\'image'. $j .'\', \'document\',\''. $fields['icon2'][$j] . '\', true);" title="' . $fields['mouseover'][$j] . '" class="' . $class . '">%s</a>';


					// icon
					$icon = '';
					if (!empty($fields['icon'][$j]))
					{
						$icon	= '<img src="' . $fields['icon'][$j] . '" alt="' . $fields['mouseover'][$j] . '" align="absbottom" border="0"' . (empty($fields['shortcut'][$j]) ? '' : ' hspace="5"') . ' name="image'. $j .'" />';
					}
				}


				// icon & shortcut
				$wres = sprintf($wres, $icon. $fields['shortcut'][$j]);
				
				$main_menu_fields[] = array(
					'layer_no' => $j,
					'url' => $fields['url'][$j],
					'mouseover' => $fields['mouseover'][$j],
					'icon' => $fields['icon'][$j],
					'icon2' => $fields['icon2'][$j],
					'shortcut' => $fields['shortcut'][$j],
					'explain' => $fields['explain'][$j],
				);

				// add to options
				$options[] = $wres;
				
				/////////////////////////////////////////////////
				$sub_menu = array();
				$sub_menu_urls = array();
				$sub_menu_names = array();
				$sub_menu_keys = array();
				$tree_id = '';

				$temp1 = explode("?",$fields['url'][$j]);
				$temp2 = explode("&",$temp1[1]);
				$temp3 = explode("=",$temp2[0]);				

				$tree_id = $temp3[0].$temp3[1];

				$special_forum_list = array();				
				$special_forum_list = explode(',',$board_config['special_forum']);				

				if($temp3[0] == POST_CAT_URL) {

					// get the sub-menus
					for ($i = 0; $i < count($tree['sub'][$tree_id]); $i++ )
					{		
						$sub_menu_key = $tree['sub'][$tree_id][$i];
						if($tree['auth'][$sub_menu_key]['auth_view']) {						
							$sub_menu_name = $qbar_maps['default_tree']['fields'][$sub_menu_key]['shortcut'];
							$sub_menu_url = append_sid($qbar_maps['default_tree']['fields'][$sub_menu_key]['url']);
							$sub_menu_explain = $qbar_maps['default_tree']['fields'][$sub_menu_key]['explain'];		
							$sub_menu_item = '<a href="'. $sub_menu_url . '" class=calendar>' . $sub_menu_name . '</a>';
							$sub_menu[] = $sub_menu_item;						
							$sub_menu_urls[] = $sub_menu_url;
							$sub_menu_names[] = $sub_menu_name;
							$sub_menu_keys[] = $sub_menu_key;
						}
					}
				}
				else if($temp3[0] == POST_FORUM_URL && (in_array($temp3[1], $special_forum_list))) {
					

					//
					// Check if the user has actually sent a forum ID with his/her request
					// If not give them a nice error page.
					//					
					$sql = "SELECT *
						FROM " . FORUMS_TABLE . "
						WHERE forum_id = ".$temp3[1];
					if ( !($result = $db->sql_query($sql)) )
					{
						message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
					}

					//
					// If the query doesn't return any rows this isn't a valid forum. Inform
					// the user.
					//
					if ( !($forum_row = $db->sql_fetchrow($result)) )
					{
						message_die(GENERAL_MESSAGE, 'Forum_not_exist');
					}

					$sort_value = $forum_row['forum_display_sort'];
					$order_value = $forum_row['forum_display_order'];
					$sort_value2 = $forum_row['forum_display_sort2'];
					$order_value2 = $forum_row['forum_display_order2'];

					$sort_method = get_forum_display_sort_option($sort_value, 'field', 'sort_extend');
					$order_method = get_forum_display_sort_option($order_value, 'field', 'order');
					$sort_method2 = get_forum_display_sort_option($sort_value2, 'field', 'sort_extend');
					$order_method2 = get_forum_display_sort_option($order_value2, 'field', 'order');


					$sql = "SELECT t.*, u.username, u.user_level, u.user_id, u2.username as user2, u2.user_id as id2, p.post_username, p.post_id, p.post_attachment, p2.post_username AS post_username2, p2.post_time, pt.*  
						FROM " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . POSTS_TABLE . " p2, " . USERS_TABLE . " u2, " . POSTS_TEXT_TABLE . " pt 
						WHERE t.forum_id = " .$temp3[1]. " 
							AND t.topic_poster = u.user_id
							AND pt.post_id = p.post_id
							AND p.post_id = t.topic_first_post_id
							AND p2.post_id = t.topic_last_post_id
							AND u2.user_id = p2.poster_id 
							AND t.topic_type <> " . POST_ANNOUNCE . " 							
						ORDER BY t.topic_type DESC, $sort_method $order_method, $sort_method2 $order_method2, t.topic_last_post_id DESC 
						";
		
					if ( !($result = $db->sql_query($sql)) )
					{
					   message_die(GENERAL_ERROR, 'Could not obtain topic information', '', __LINE__, __FILE__, $sql);
					}

					while( $row = $db->sql_fetchrow($result) )
					{
						$sub_menu_name = $row['topic_title'];
						$sub_menu_url = append_sid('viewtopic.php?'.POST_TOPIC_URL.'='.$row['topic_id']);
						$sub_menu_explain = $row['topic_title'];
						$sub_menu_item = '<a href="'. $sub_menu_url . '" class=calendar>' . $sub_menu_name . '</a>';
						$sub_menu[] = $sub_menu_item;						
						$sub_menu_urls[] = $sub_menu_url;
						$sub_menu_names[] = $sub_menu_name;
						$sub_menu_keys[] = $row['topic_id'];						
					}


				}
				
				
				$sub_menus[] = $sub_menu;
				$sub_menus_urls[] = $sub_menu_urls;
				$sub_menus_names[] = $sub_menu_names;
				$sub_menus_keys[] = $sub_menu_keys;

				/////////////////////////////////////////////////
		
			}
			
			// send it to template
			if (count($options) > 0)
			{
				$obj_root = ($obj == 0) ? '_qbar' : '_qmenu';
				if ($cells == 0) $cells = 1;
				if ($cells > count($options)) $cells = count($options);
				$width = ceil(100 / $cells);
				$align = ($in_table) ? 'center' : (($obj == 0) ? 'left' : 'center');
				$template->assign_block_vars($obj_root, array(
					'WIDTH'	=> $width,
					'ALIGN'	=> $align,
					)
				);
				$pointer = -1;
				for ($j = 0; $j < count($options); $j++)
				{
					$inc = '';
					$pointer++;
					if ((($pointer % $cells) == 0) || ($in_table))
					{
						if (($pointer % $cells) == 0)
						{
							$template->assign_block_vars($obj_root . '.line', array());
						}
						$template->assign_block_vars($obj_root . '.line.cell', array());
						if (!$in_table)
						{
							$inc = '';
						}
					}


					$main_menu_fields[$j]['orginalUrl'] = $main_menu_fields[$j]['url'];

					if (0 < count($sub_menus[$j]))
					{						
						$main_menu_fields[$j]['url'] = $sub_menus_urls[$j][0];
					}

					$a_tag = '';
					if(count($sub_menus)>$j+1){
						if(0 < count($sub_menus[$j+1])) {
							$a_tag = '<A ';
						}
					}

					$iconSize = GetImageSize($main_menu_fields[$j]['icon']);

					$template->assign_block_vars($obj_root . '.line.cell.field', array(
						'OPTION' => $inc . $options[$j] . ($in_table ? $inc : ''),							
						'A_TAG' => $a_tag,							
						'LAYER_NO' => $main_menu_fields[$j]['layer_no'],
						'URL' => $main_menu_fields[$j]['url'],
						'MOUSEOVER' => $main_menu_fields[$j]['mouseover'],
						'ICON' => $main_menu_fields[$j]['icon'],
						'ICON2' => $main_menu_fields[$j]['icon2'],
						'WIDTH' => $iconSize[0],
						'SHORTCUT' => $main_menu_fields[$j]['shortcut'],
						'EXPLAIN' => $main_menu_fields[$j]['explain'],						
						)
					);

					if( $j == (count($options)-1) ) {
							$template->assign_block_vars($obj_root . '.line.cell.field.switch_last', array());
					}
					else
					{
						$template->assign_block_vars($obj_root . '.line.cell.field.switch_not_last', array());
					}

					if (0 < count($sub_menus[$j]))
					{						
						$template->assign_block_vars($obj_root . '.line.cell.field.switch_not_empty', array());

						//
						// portal or not
						//
						if ( strstr($_SERVER["PHP_SELF"] ,"portal.php"))
						{
							$template->assign_block_vars($obj_root . '.line.cell.field.switch_not_empty.switch_portal', array());
						}
						else
						{
							$template->assign_block_vars($obj_root . '.line.cell.field.switch_not_empty.switch_not_portal', array());
						}
					}
					else {
						$template->assign_block_vars($obj_root . '.line.cell.field.switch_empty', array());
					}

					for ($k=0; $k < count($sub_menus[$j]); $k++)
					{						
						$template->assign_block_vars($obj_root . '.line.cell.field.sub_menu', array(			
							'SUB_MENU' => $sub_menus[$j][$k],
							'SUB_MENU_URL' => $sub_menus_urls[$j][$k],
							'SUB_MENU_NAME' => $sub_menus_names[$j][$k],
							'SUB_MENU_KEY' => $sub_menus_keys[$j][$k],
							'SUB_MENU_NO' => $k,
							)
						);
					}

					if ($in_table)
					{
						$template->assign_block_vars($obj_root . '.line.cell.field.in_table', array());
						if ($j == 0)
						{
							// number of cells to add to the first line
							$n = $cells-((count($options)-1) % $cells)+1;
						}
						if ($pointer == ($cells-$n+1))
						{
							// add clear tab
							for ($k=1; $k < ($n-1); $k++)
							{
								$pointer++;
								$template->assign_block_vars($obj_root . '.line.cell', array());
								$template->assign_block_vars($obj_root . '.line.cell.field', array());
							}
						}
					} // end if in table
				} // end read options
			} // if options
		} // object

		// send it to main template
		if ($obj == 0)
		{
			if (count($qbars['fields']) > 0)
			{
				$template->assign_var_from_handle('QBARS', '_qbars');
			}
		}
		else
		{
			if (count($qmenu['fields']) > 0)
			{
				$template->assign_var_from_handle('QMENUS', '_qmenus');
			}
		}
	} // end for $obj
}

?>