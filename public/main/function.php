<?php
function is_auth(){
  if(!isset($_COOKIE['phpbb3_s3ldz_u']) || $_COOKIE['phpbb3_s3ldz_u'] == 1 ){
    return 0;
  }else{
    return 1;
  }
}
function main_get_rss($url, $num){
$html = " ";
$xml = simplexml_load_file($url);
for($i = 0; $i < $num; $i++){
  $title = explode('•',$xml->entry[$i]->title);
  $link = $xml->entry[$i]->link;
  //$description = $xml->channel->item[$i]->description;
  $html .= "<li><a href='$link'>$title[1]</a></li>";
  //$html .= "$description"; // Description
}
echo "$html";
}
function main_get_data_db($id,$num){
  $dbname="phpbb";
  $dbhost="localhost";
  $dbuser="phpbb";
  $dbpass="phpbb";
  $dbconn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass")
  or die('ERROR: NOT CONNECT DB main/function.php: ' . pg_last_error());
  $query = 'select topic_title,topic_id from phpbb_topics where forum_id='.$id.' order by topic_id desc limit '.$num.';';
  $result = pg_query($query) or die('ERROR: QUERY DB main/function.php: ' . pg_last_error());
  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "<li><a href=https://archlinux.com.ru/forum/viewtopic.php?t=" . $line['topic_id'] . ">" .$line['topic_title'] . "</a></li>";
  }
  pg_free_result($result);
  pg_close($dbconn);
}
?>
