<?php
include 'configs/DbConn.php';

if(isset($_POST['submit'])){
    
    $AuthorFullName = $_POST['AuthorFullName'];
    $AuthorEmail = $_POST['AuthorEmail'];
    $AuthorDateOfBirth = $_POST['DateOfBirth'];
    $AuthorAddress = $_POST['AuthorAddress'];
    $AuthorBiography = $_POST['AuthorBiography'];
    //$AuthorPassword =$_POST['AuthorPassword'];

    $sql = "update `authorstb` set '$id', name='$AuthorFullName', email='$AuthorEmail', address='$AuthorAddress', dateofbirth='$AuthorDateOfBirth' authorbio='$AuthorBiography' where id='$id'";
    $result = mysqli_query($Dbcon, $sql);
    if($result){
        echo "Data inserted successfully";
        //header('location:ViewAuthors.php');
    }else{
        echo "Data not inserted";
    }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    
    <title>Authors Page</title>
</head>
<body>
  <form method="post">
    <div class="mb-3">
    <label for="AuthorFullName" class="form-label">Authors Name</label>
    <input type="text" class="form-control" name="AuthorFullName" id="AuthorFullName" placeholder="Enter your full name">
    </div>
  <div class="mb-3">
    <label for="AuthorEmail" class="form-label">Email address</label>
    <input type="email" name="AuthorEmail" id="AuthorEmail" class="form-control" placeholder="Enter Authors Email here">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="AuthorsAddress" class="form-label">Authors Address</label>
    <input type="text" name="AuthorAddress" id="AuthorAddress" class="form-control" >
  </div>
  <div class="mb-3">
    <label for="AuthorBiography" class="form-label">Authors Biography here</label>
    <input type="text" class="form-control" name="AuthorBiography" id="AuthorBiography" placeholder="Enter your biography here">
  </div>
  <div class="mb-3">
    <label for="AuthorsDateOfBirth" class="form-label">Authors Date of Birth</label>
    <input type="date" name="AuthorsDateOfBirth" class="form-control" id="AuthorsDateOfBirth" placeholder="Enter your date of birth">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

    
</body>
</html>