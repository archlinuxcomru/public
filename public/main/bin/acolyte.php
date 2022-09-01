<?php
//
//!!!! to rss.php !!!
//
//define('IN_PHPBB', true);
//$phpbb_root_path = '/srv/http/archlinux.com.ru/public/forum/';
//$phpEx = substr(strrchr(__FILE__, '.') , 1);
//include ($phpbb_root_path . 'common.' . $phpEx);
//include ($phpbb_root_path . 'includes/functions_posting.' . $phpEx);

$user_id = 98; //acolyte user

$path = '/srv/http/archlinux.com.ru/public/main/bin/tmp/';
$title = $path . 'acolyte-post-title.txt';
$body = $path . 'acolyte-post-body.txt';
$f_id =  $path . 'acolyte-forum-id.txt';

if(file_exists($title) && file_exists($body) && file_exists($f_id)){
  $subject = file_get_contents($title);
  $text = file_get_contents($body); 
  $forum_id = file_get_contents($f_id); 
  unlink($body);
  unlink($title); 
  unlink($f_id);

  //Initialize user variables
  $user->session_begin();
  $user->session_create($user_id);
  $auth->acl($user->data);
  $user->setup();
  
  //User initialized, we can now do our things :D
  
  //Get the forum name (needed by submit_post for e-mail notifications)
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
    echo "ERROR: sending post";
  }
  else{
    echo "SUCCESS: Post sent successfully, URL is: $result";
  }
  //After doing things, just clean up the session
  $user->session_kill(false);
}
?>
