<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


$dsn = "mysql:host=localhost;dbname=app;charset=utf8";
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => TRUE,
);

try {
    $dbh = new PDO($dsn, 'root', '6980058897', $opt);

    echo 'Connected to database';
} catch (PDOException $e) {
    echo $e->getMessage();
}


$post = $_POST;
$userid = $post['fbid'];
$username = $post['fbusername'];
$value = $post['extra'];
$question=$post['question'];
//$fbusermail=json_decode($_POST['fbmail']);


var_dump($userid);
var_dump($username);
var_dump($value);

//page0

$stmt = $dbh->prepare("INSERT INTO allusers(userid,username)  VALUES (:userid,:username)");
$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
$stmt->execute();




//page1
if (($value==4)&&($question==1)) {
    var_dump($value);
    var_dump($question);
    $stmt = $dbh->prepare("INSERT INTO question1(userid,username)  VALUES (:userid,:username)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->execute();
}elseif($value!=4){
    $stmt = $dbh->prepare("INSERT INTO loosers(userid,username,questions,val)  VALUES (:userid,:username,:questions,:val)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->bindParam(':questions', $question, PDO::PARAM_INT);
    $stmt->bindParam(':val', $val, PDO::PARAM_INT);
    $stmt->execute();
}


//page2
if(($value==4)&&($question==2)){

    $stmt = $dbh->prepare("INSERT INTO question2(userid,username)  VALUES (:userid,:username)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->execute();
}else{
    $stmt = $dbh->prepare("INSERT INTO loosers(userid,username,questions,val)  VALUES (:userid,:username,:questions,:val)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->bindParam(':questions', $question, PDO::PARAM_INT);
    $stmt->bindParam(':val', $val, PDO::PARAM_INT);
    $stmt->execute();
}



//page3
if(($value==3)&&($question==3)){


    $stmt = $dbh->prepare("INSERT INTO question3(userid,username)  VALUES (:userid,:username)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->execute();
}else {
    $stmt = $dbh->prepare("INSERT INTO loosers(userid,username,questions,val)  VALUES (:userid,:username,:questions,:val)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->bindParam(':questions', $question, PDO::PARAM_INT);
    $stmt->bindParam(':val', $val, PDO::PARAM_INT);
    $stmt->execute();
}
//page4
if(($value==1) &&($question==4)){


    $stmt = $dbh->prepare("INSERT INTO question4(userid,username)  VALUES (:userid,:username)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->execute();
}else {
    $stmt = $dbh->prepare("INSERT INTO loosers(userid,username,questions,val)  VALUES (:userid,:username,:questions,:val)");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//$stmt->bindParam(':usermail', $usermail, PDO::PARAM_STR);
    $stmt->bindParam(':questions', $question, PDO::PARAM_INT);
    $stmt->bindParam(':val', $val, PDO::PARAM_INT);
    $stmt->execute();
}




?>
