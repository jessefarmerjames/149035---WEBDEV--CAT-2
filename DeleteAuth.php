<?
include 'configs/DbConn.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from 'authorstb' where id=$id";
    $result=mysqli_query($Dbcon,$sql);
    if($result){
        // echo "Deleted successfully";

        header('ViewAuthors.php');
    }else{
        echo "Data not deleted";
    }
}


?>