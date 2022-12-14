<?php
/**
 *
 * phpBB Media Embed PlugIn extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2016 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'ACP_PHPBB_MEDIA_EMBED'				=> 'Media Embed',
	'ACP_PHPBB_MEDIA_EMBED_MANAGE'		=> 'Gerenciar sites',
	'ACP_PHPBB_MEDIA_EMBED_SETTINGS'	=> 'Configurações',

	// Log keys
	'LOG_PHPBB_MEDIA_EMBED_CACHE_PURGED'=> '<strong>Cache de Media Embed removido</strong>',
	'LOG_PHPBB_MEDIA_EMBED_MANAGE'		=> '<strong>Sites do Media Embed atualizados</strong>',
	'LOG_PHPBB_MEDIA_EMBED_SETTINGS'	=> '<strong>Configurações do Media Embed atualizadas</strong>',
]);
