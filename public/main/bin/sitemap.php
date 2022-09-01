<?php
date_default_timezone_set('Europe/Minsk');
define('IN_PHPBB', true);
$phpbb_root_path = '/srv/http/archlinux.com.ru/public/forum/';
$phpEx = substr(strrchr(__FILE__, '.') , 1);
include ($phpbb_root_path . 'common.' . $phpEx); 
include ($phpbb_root_path . 'includes/functions_posting.' . $phpEx);

function rrr($user,$auth,$db){
$user_id = 1;
$user->session_begin();
$user->session_create($user_id);
$auth->acl($user->data);
$user->setup();

$url = "https://archlinux.com.ru/";

$date = date('c'); 
$sitemap = "<?xml version='1.0' encoding='UTF-8'?>\n";
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
$sitemap .= "\n<url>
  <loc>".$url."</loc>
  <lastmod>".$date."</lastmod>
  <priority>1.00</priority>
</url>";
$sql = 'SELECT forum_id,forum_last_post_time  FROM ' . FORUMS_TABLE;
$result = $db->sql_query($sql);
while ($row = $db->sql_fetchrow($result)){
  $sitemap .= "\n<url>
  <loc>".$url."forum/viewforum.php?f=".$row['forum_id']."</loc>
  <lastmod>".date_format(date_timestamp_set(new DateTime(), $row['forum_last_post_time']), 'c')."</lastmod>
  <priority>0.81</priority>
  </url>";
};
$db->sql_freeresult($result);
$sql = 'SELECT topic_id,topic_last_post_time FROM ' . TOPICS_TABLE;
$result = $db->sql_query($sql);
while ($row = $db->sql_fetchrow($result)){
  $sitemap .= "\n<url>
  <loc>".$url."forum/viewtopic.php?t=".$row['topic_id']."</loc>
  <lastmod>".date_format(date_timestamp_set(new DateTime(), $row['topic_last_post_time']), 'c')."</lastmod>
  <priority>0.67</priority>
  </url>";
};
$db->sql_freeresult($result);
$sitemap .= "\n</urlset>";
file_put_contents("/srv/http/archlinux.com.ru/public/sitemap.xml", $sitemap);

$user->session_kill(false);
}

rrr($user,$auth,$db);
?>
