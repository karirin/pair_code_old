<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

try
{
    
$pro_name=$_POST['name'];
$pro_address=$_POST['address'];
$pro_time_start=$_POST['time_start'];
$pro_time_end=$_POST['time_end'];
$pro_gazou_name=$_POST['gazou_name'];

$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_address=htmlspecialchars($pro_address,ENT_QUOTES,'UTF-8');
$pro_time_start=htmlspecialchars($pro_time_start,ENT_QUOTES,'UTF-8');
$pro_time_end=htmlspecialchars($pro_time_end,ENT_QUOTES,'UTF-8');

$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO mst_product(name,address,time_start,time_end,gazou) VALUES (?,?,?,?,?)';
$stmt = $dbh -> prepare($sql);
$data[] = $pro_name;
$data[] = $pro_address;
$data[] = $pro_time_start;
$data[] = $pro_time_end;
$data[] = $pro_gazou_name;
$stmt -> execute($data);

$dbh = null;

print 'カフェを追加しました。<br />';

}   
catch (Exception $e)
{
print'ただいま障害により大変ご迷惑をお掛けしております。';
exit();
}

?>

<a href="pro_list.php">戻る</a>
</body>
</html>