<?php 
require_once('../config.php');
set_flash('sucsess','投稿を削除しました');
header('Location:../user_login/user_top.php?type=main');
require_once('../head.php');
?>
<body>
<?php
try
{

$post_id = $_POST['id'];
$post_gazou_name = $_POST['gazou_name'];

$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM post WHERE id=?';
$stmt = $dbh -> prepare($sql);
$data[] = $post_id;
$stmt -> execute($data);

$dbh = null;

if($post_gazou_name != '')
{
    unlink('./gazou/'.$post_gazou_name);
}

}   
catch (Exception $e)
{
print'ただいま障害により大変ご迷惑をお掛けしております。';
exit();
}

?>

</body>
<?php require_once('../footer.php'); ?>
</html>