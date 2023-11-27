<?php
require_once "configs\DbConn.php";

if(isset($_POST["submit"])){
    $AuthorFullName = addslashes(strtolower($_POST["AuthorName"]));
    $AuthorEmail = addslashes(strtolower($_POST["AuthorEmail"]));
    $AuthorDateOfBirth = addslashes($_POST["AuthorDateOfBirth"]);
    $AuthorAddress = addslashes($_POST["AuthorAddress"]);
    $AuthorBiography = addslashes($_POST['AuthorBiography']);
    $AuthorSuspended = addslashes($_POST['AuthorSuspended']);
    

    if(!filter_var($AuthorEmail, FILTER_VALIDATE_EMAIL)){
        die("Invalid Email");
    }


    $stmt = $pdo->prepare("INSERT INTO authorstb (AuthorName, AuthorEmail, AuthorDateOfBirth, AuthorAddress, AuthorBiography,AuthorSuspended) VALUES (?, ?, ?, ?,?,?)");

    $stmt->execute([$AuthorDateOfBirth, $AuthorFullName, $AuthorEmail,$AuthorDateOfBirth, $AuthorAddress, $AuthorBiography, $AuthorSuspended]);

    header("Location: index.php");
    exit();
}
if(isset($_POST["update"])){
    $AuthorFullName = addslashes(strtolower($_POST["AuthorName"]));
    $AuthorEmail = addslashes(strtolower($_POST["AuthorEmail"]));
    $AuthorDateOfBirth = addslashes($_POST["AuthorDateOfBirth"]);
    $AuthorAddress = addslashes($_POST["AuthorAddress"]);
    $AuthorBiography = addslashes($_POST['AuthorBiography']);


    if(!filter_var($AuthorEmail, FILTER_VALIDATE_EMAIL)){
        die("Invalid sender_email");
    }

    $stmt = $pdo->prepare("UPDATE messages SET sender_email=?, receiver_email=?, subject=?, message=? WHERE messageId=? LIMIT 1");

    $stmt->execute([$AuthorDateOfBirth, $AuthorAddress, $AuthorFullName, $AuthorBiography,$AuthorEmail]);

    header("Location: ViewAuthors.php");
    exit();
}

if(isset($_GET["deleteid"])){
    $stmt = $pdo->prepare("SELECT * FROM authorstb WHERE messageId=? LIMIT 1");
    $stmt->execute([$_GET["deleteid"]]);
    $message = $stmt->fetch();
    if($message){
        $stmt = $pdo->prepare("DELETE FROM messages WHERE messageId=? LIMIT 1");
        $stmt->execute([$_GET["deleteid"]]);
        header("Location: ViewAuthors.php");
        exit();
    }else{
        header("Location: ViewAuthors.php");
        exit();
    }

}

?>