<?php
require 'configs/DbConn.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="">
    
    
    <title>Authors Display</title>
    <body>
    <div class="container my-5">
        <button class="btn btn-primary my-5"><a href="processes/AuthRegistration.php" class="text-light"> Add user </button></a>
</button>
<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Auth Id</th>
      <th scope="col">Authors Name</th>
      <th scope="col">Authors Email</th>
      <th scope="col">Authors Address</th>
      <th scope="col">Authors Bio</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $sql="Select * from authorstb";
    $result=mysqli_query($Dbcon, $sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $AuthorId = $_POST['Author ID'];
            $AuthorFullName = $_POST['Authorsname'];
            $AuthorEmail = $_POST['email'];
            $AuthorDateOfBirth = $_POST['mobile'];
            $AuthorAddress = $_POST['AuthorAddress'];
            $AuthorBiography = $_POST['AuthorBiography'];
            echo ' <tr>
            <th scope="row">'.$id.'</th>
                <td>'.$AuthorFullName.'</td>
                <td>'.$AuthorEmail.'</td>
                <td>'.$AuthorDateOfBirth.'</td>
                <td>'.$AuthorAddress.'</td>
                <td>'.$AuthorBiography.'</td>
                <td>
                    <button class="btn-primary"><a href="update.php" updateid='.$id.' class="text-light">Update</a><button>
                    <button class="btn-danger"><a href="delete.php" deleteid='.$id.' class="text-light">Delete</a><button>
                </td>
            </tr>';
        }

        }

?>
  </tbody>
  </table>
    </div>
    </body>
</html>
