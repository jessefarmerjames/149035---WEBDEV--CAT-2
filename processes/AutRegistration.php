<?php
require_once "../includes/DB_Connect.php";

if(isset($_POST["send_message"])){
    $AuthorFullName = addslashes(strtolower($_POST["AuthorName"]));
    $AuthorEmail = addslashes(strtolower($_POST["AuthorEmail"]));
    $AuthorDateOfBirth = addslashes($_POST["AuthorDateOfBirth"]);
    $AuthorAddress = addslashes($_POST["AuthorAddress"]);
    $AuthorBiography = addslashes($_POST['AuthorBiography']);

    if(!filter_var($AuthorEmail, FILTER_VALIDATE_EMAIL)){
        die("Invalid sender_email");
    }


    $stmt = $pdo->prepare("INSERT INTO authorstb (AuthorName, AuthorEmail, AuthorDateOfBirth, AuthorAddress) VALUES (?, ?, ?, ?)");

    $stmt->execute([$AuthorDateOfBirth, $AuthorAddress, $AuthorFullName, $AuthorBiography,$AuthorEmail]);

    header("Location: ../view_messages.php");
    exit();
}
if(isset($_POST["update_message"])){
    $AuthorFullName = addslashes(strtolower($_POST["AuthorName"]));
    $AuthorEmail = addslashes(strtolower($_POST["AuthorEmail"]));
    $AuthorDateOfBirth = addslashes($_POST["AuthorDateOfBirth"]);
    $AuthorAddress = addslashes($_POST["AuthorAddress"]);
    $AuthorBiography = addslashes($_POST['AuthorBiography']);


    if(!filter_var($AuthorEmail, FILTER_VALIDATE_EMAIL)){
        die("Invalid sender_email");
    }

    $stmt = $pdo->prepare("UPDATE messages SET sender_email=?, receiver_email=?, subject=?, message=? WHERE messageId=? LIMIT 1");

    $stmt->execute([$sender_email, $receiver_email, $subject, $message, $messageId]);

    header("Location: ../view_messages.php");
    exit();
}

if(isset($_GET["DelId"])){
    $stmt = $pdo->prepare("SELECT * FROM authorstb WHERE messageId=? LIMIT 1");
    $stmt->execute([$_GET["DelId"]]);
    $message = $stmt->fetch();
    if($message){
        $stmt = $pdo->prepare("DELETE FROM messages WHERE messageId=? LIMIT 1");
        $stmt->execute([$_GET["DelId"]]);
        header("Location: ../view_messages.php");
        exit();
    }else{
        header("Location: ../view_messages.php");
        exit();
    }

}

?>