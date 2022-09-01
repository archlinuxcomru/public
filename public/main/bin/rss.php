<?php
date_default_timezone_set('Europe/Minsk');
define('IN_PHPBB', true);
$phpbb_root_path = '/srv/http/archlinux.com.ru/public/forum/';
$path_bin = "/srv/http/archlinux.com.ru/public/main/bin/tmp/";
$phpEx = substr(strrchr(__FILE__, '.') , 1);
include ($phpbb_root_path . 'common.' . $phpEx);
include ($phpbb_root_path . 'includes/functions_posting.' . $phpEx);

function gen_sitemap(){
  $user = $GLOBALS['user'];
  $auth = $GLOBALS['auth'];
  $db = $GLOBALS['db'];
  
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
  $sitemap .= "\n<url>
    <loc>".$url."forum</loc>
    <lastmod>".$date."</lastmod>
    <priority>0.95</priority>
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


function acolyte($user_id,$forum_id,$text,$subject){
  $user = $GLOBALS['user'];
  $auth = $GLOBALS['auth'];
  $db = $GLOBALS['db'];

  //$user_id = 98; //acolyte user
  //$forum_id = 
  
  //Initialize user variables
  $user->session_begin();
  $user->session_create($user_id);
  $auth->acl($user->data);
  $user->setup();
  
  $sql = 'SELECT forum_name FROM ' . FORUMS_TABLE . ' WHERE forum_id=' . (int)$forum_id;
  $result = $db->sql_query($sql);
  $row = $db->sql_fetchrow($result);
  $db->sql_freeresult($result);
  $forum_name = $row['forum_name'];
  //Submit the new post
  $poll = $uid = $bitfield = $flags = '';
  generate_text_for_storage($text, $uid, $bitfield, $flags, true, true, true);
  $data = array(
      'forum_id'      => $forum_id,
      'topic_id'       => 0,
      'icon_id'       => false,
      'enable_bbcode'     => true,
      'enable_smilies'    => true,
      'enable_urls'       => true,
      'enable_sig'        => true,
      'message'       => $text,
      'message_md5'   => md5($text),
      'bbcode_bitfield'   => $bitfield,
      'bbcode_uid'        => $uid,
      'enable_markdown'   => true,
      'post_edit_locked'  => 0,
      'topic_title'       => $subject,
      'notify_set'        => false,
      'notify'            => false,
      'post_time'         => 0,
      'forum_name'        => $forum_name,
      'enable_indexing'   => true,
      'force_approved_state'    => true,
      'force_visibility'            => true,
  );
    $result = submit_post('post', $subject, '', POST_NORMAL, $poll, $data);
 
  if ($result===FALSE){
    echo "ERROR: sending post\n";
  }
  else{
    echo "SUCCESS: Post sent successfully, URL is: $result\n";
  }
  //After doing things, just clean up the session
  $user->session_kill(false);
}

function htmlTobb($html, $bbcode_uid = 0){
  $tags = array(
  '#<strong>(.*?)</strong>#si' => '[b]\\1[/b]',
  '#<b>(.*?)</b>#si' => '[b]\\1[/b]',
  '#<em>(.*?)</em>#si' => '[i]\\1[/i]',
  '#<i>(.*?)</i>#si' => '[i]\\1[/i]',
  '#<u>(.*?)</u>#si' => '[u]\\1[/u]',
  '#<s>(.*?)</s>#si' => '[s]\\1[/s]',
  '#<h2>(.*?)</h2>#si' => '[h1]\\1[/h1]',
  '#<h3>(.*?)</h3>#si' => '[h2]\\1[/h2]',
  '#<h4>(.*?)</h4>#si' => '[h3]\\1[/h3]',
  '#<ul>(.*?)</ul>#si' => '[list]\\1[/list]',
  '#<ol>(.*?)</ol>#si' => '[list]\\1[/list]',
  '#<li>(.*?)</li>#si' => '[list]\\1[/list]',
  '#&nbsp;#si' => ' ',
  '#<center>(.*?)</center>#si' => '[center]\\1[/center]',
  //'#<br(.*?)>#si' => chr(13).chr(10),
  '#<br(.*?)>#si' => ' ',
  //'#<p>(.*?)</p>#si' => chr(13).chr(10).chr(13).chr(10).'\\1',
  '#<p>(.*?)</p>#si' => '\\1',
  '#<font.*? color="(.*?)".*?>(.*?)</font>#si' => '[color=\\1]\\2[/color]',
  '#<img.*? src="(.*?)".*?>#si' => '[img]\\1[/img]',
  '#<a.*? href="(.*?)".*?>(.*?)</a>#si' => '[url=\\1]\\2[/url]',
  '#<code>(.*?)</code>#si' => '[code]\\1[/code]',
  '#<span.*? style="(.*?)".*?>(.*?)</span>#si' => '[style=\\1]\\2[/style]',
  );
  foreach ($tags as $search => $replace)
    $html = preg_replace($search, $replace, $html);
    $html= preg_replace('/<([^<>]*)>/', '',$html);
  return $html;
}

function xmlTranslater($text){
  $xml = new DOMDocument();
  $xml->loadHTML($text);
  $obj = array();
  foreach($xml->getElementsByTagName('p') as $obj) {
    sleep(5);
    $objRU = gTranslater("$obj->nodeValue");
    if($objRU != 1){
      $obj->nodeValue = $objRU;
    }
  }
  return $xml->saveHTML();
}

function get_rss_arch($url){
  $path = $GLOBALS['path_bin'];
  $html = " ";
  $answer_headers = @get_headers($url);
  if ($answer_headers[0] != 'HTTP/1.1 404 Not Found'){
    $xml = simplexml_load_file($url);
    if($xml != NULL){
      $link = $xml->channel->item[0]->link;
      if(strcmp($link, file_get_contents($path . "point-news-link.txt"))){
        file_put_contents($path . "point-news-link.txt", $link);
        $pubDate = $xml->channel->item[0]->pubDate; 
        $titleEN = $xml->channel->item[0]->title;
        $titleRU = gTranslater($titleEN);
        if($titleRU == 1){ return 1;};
        $descriptionEN = $xml->channel->item[0]->description;
        sleep(5);
        $descriptionRU = html_entity_decode(xmlTranslater($descriptionEN));
        if($descriptionRU == NULL){ return 1;};
         
        $text = "[b]Новость c archlinux.org:[/b]\n\n";
        $text .= htmlTobb($descriptionRU);
        $text .= "\n[b]Оригинал:[/b]\n\n";
        $text .= "[spoiler][b]".$titleEN."[/b]\n";
        $text .= htmlTobb($descriptionEN) . "[/spoiler]\n\n";
        $text .= "[color=#666]".$pubDate."[/color]\n";
        $text .= "[url]".$link."[/url]";
        acolyte(98,49,"$text","$titleRU");
      }else{
        echo "NOTICE: ACOLYTE NO NEWS\n";
      }
    }else{
      echo "ERROR: archlinux.org RSS access\n";
    }
  }else{
    echo "ERROR: archlinux.org RSS 404 access\n";
  }
}

function gTranslater($text){
  $str = " ";
  $payload = [ 'text' => "$text" ];
  $url = "https://translate.googleapis.com/translate_a/single?client=gtx&dt=t&sl=auto&tl=ru";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_VERBOSE, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
  $out = json_decode(curl_exec($ch));
  curl_close($ch);
  if($out != NULL){
    $out = array_slice($out, 0, 3);
    foreach($out as $element) {
      if(is_array($element)){
        foreach($element as $obj) {
          if(is_array($obj)){
            $str .= $obj[0];
          }
        }
      }
    }
  }else{
    echo "ERROR: google translater\n";
    return 1;
  }
  return $str;
}

function cleanBr($txt){
    $txt=preg_replace("{(<br[\\s]*(>|\/>)\s*){2,}}i", "<br /><br />", $txt);
    $txt=preg_replace("{(<br[\\s]*(>|\/>)\s*)}i", "<br />", $txt);
    return $txt;
}


function xml_opennet($link){
  $html = file_get_contents($link);
  $dom = new DOMDocument();
  $dom->loadHTML($html, LIBXML_NOERROR);
  $xpath = new DOMXPath($dom);
  $results = $xpath->query('//*[@class="chtext"]');
  $innerHTML = " "; 
  $children = $results->item(0)->childNodes;
  foreach ($children as $child){
    $innerHTML .= $results->item(0)->ownerDocument->saveHTML($child);
  }
  return htmlTobb(cleanBr($innerHTML));
}

function get_rss_opennet($url, $num){
  $path = $GLOBALS['path_bin'];
  $date = file_get_contents($path . "point-news-date.txt");
  $answer_headers = @get_headers($url);
  if ($answer_headers[0] != 'HTTP/1.1 404 Not Found'){
    $xml = simplexml_load_file($url);
    for($i = $num; $i != -1; $i--){
      $pubDate = $xml->channel->item[$i]->pubDate;
      if( strtotime($pubDate) > $date){
        file_put_contents($path . "point-news-date.txt", strtotime($pubDate));
        $title = $xml->channel->item[$i]->title;
        $link = $xml->channel->item[$i]->link;
        $body = "[b]".$title."[/b]\n";
        $body .= "[color=#666]Дата публикации:".$pubDate."[/color]\n\n";
        $body .= xml_opennet($link);
        $body .= "\n\n[color=#666]Новость позаимствована с opennet.ru\nСсылка на оригинал: [url]".$link."[/url][/color]";
        acolyte(98,56,"$body","$title");
      }
    } 
    echo("SUCCESS: GET RSS opennet.ru UPDATE : phpbb_news.service\n");
  }else{
    echo("ERROR: GET RSS opennet.ru UPDATE : phpbb_news.service\n");
  }
}

function get_rss_package($url, $num){
  $path = $GLOBALS['path_bin'] . "package.html";
  $html = "<!-- noindex -->";
  $answer_headers = @get_headers($url);
  if ($answer_headers[0] != 'HTTP/1.1 404 Not Found'){
    $xml = simplexml_load_file($url);
    for($i = 0; $i < $num; $i++){
      //$title = $xml->channel->item[$i]->title;
      $title = explode(" ",$xml->channel->item[$i]->title);
      $link = $xml->channel->item[$i]->link;
      $html .= "<li><a href='$link'>$title[0] $title[1]</a><small>$title[2]</small></li>";
    }
    $html .= "<small id=\"update\">".date("d.m.y H:i")."</small> <!-- /noindex -->";
    file_put_contents($path, $html);
    echo("SUCCESS: GET RSS archlinux.org UPDATE : phpbb_news.service\n");
  }else{
    echo("ERROR: GET RSS archlinux.org UPDATE : phpbb_news.service\n");
  }
}

gen_sitemap();
get_rss_package("https://archlinux.org/feeds/packages/",10);
get_rss_opennet("https://www.opennet.ru/opennews/opennews_all_utf.rss",10); 
get_rss_arch("https://archlinux.org/feeds/news/");

?>
  
