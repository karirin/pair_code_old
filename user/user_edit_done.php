<?php require_once('../head.php'); ?>
<body>

<?php

try
{

$user_id = $_POST['id'];
$user_name = $_POST['name'];
$user_pass = $_POST['pass'];

$user_name=htmlspecialchars($user_name,ENT_QUOTES,'UTF-8');
$user_pass=htmlspecialchars($user_pass,ENT_QUOTES,'UTF-8');

$dbh = dbConnect();
$sql = 'UPDATE user SET name=?,password=? WHERE id=?';
$stmt = $dbh -> prepare($sql);
$data[] = $user_name;
$data[] = $user_pass;
$data[] = $user_id;
$stmt -> execute($data);

$dbh = null;

}   
catch (Exception $e)
{
print'ただいま障害により大変ご迷惑をお掛けしております。';
exit();
}

?>

修正しました。<br />
<br />
<a href="user_list.php">戻る</a>
</body>
<?php require_once('../footer.php'); ?>
</html>