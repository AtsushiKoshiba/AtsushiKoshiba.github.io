<?php

//データベースへの接続
// MySQL

try {
	$dbh = new PDO('mysql:host=localhost;dbname=blog_app','dotins','dotins');
} catch (PDOException $e){
	var_dump($e->getMessage());
	exit;
}

//処理
/*
$sql = "select * from users";
$stmt = $dbh->query($sql);
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $user){
	var_dump($user['name']);
}
echo $dbh->query("select count(*) from users")->fetchColumn() . "records found";
*/

//$stmt = $dbh->prepare("insert into users (name,email,password) values (?,?,?)");
//$stmt->execute(array("n","e","p"));
/*
$stmt = $dbh->prepare("insert into users (name,email,password) values (:name,:email,:password)");
//$stmt->execute(array(":name"=>"n3",":email"=>"e3",":password"=>"p3"));
$stmt->bindParam(":name", $name);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $password);
$name = "n10";
$email = "e10";
$password = "p10";
$stmt->execute();
*/

$stmt = $dbh->prepare("update users set email = :email where name like :name");
$stmt->execute(array(":email"=>"dummy", ":name"=>"n%"));

$stmt = $dbh->prepare("delete from users where password = :password");
$stmt->execute(array(":password"=>"p10"));

echo $stmt->rowCount() . "records deleted";

echo "done";

//切断

$dbh = null;
