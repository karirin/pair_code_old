<?php
require_once('config.php');
require_once('head.php');

  if(isset($_POST)){
  
  $current_user = get_user($_SESSION['user_id']);
  $name = $_POST['name'];
  $comment_data = $_POST['comment_data'];
  $user_id = $_POST['user_id'];

  try {
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $sql = "UPDATE user
            SET profile = :comment_data,name = :namel
            WHERE id = :user_id";
    $stmt = $dbh->prepare($sql);
    //_debug($sql);
    $stmt->execute(array(':comment_data' => $comment_data,
                         ':name' => $name,
                         ':user_id' => $user_id));
    set_flash('sucsess','プロフィールを更新しました');
    echo json_encode('sucsess');
  } catch (\Exception $e) {
    set_flash('error',ERR_MSG1);
  }
  }
  require_once('footer.php');