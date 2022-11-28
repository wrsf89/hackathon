<?php
include "db.php";

$userid = mysqli_real_escape_string($dbh, $_POST['userid']);
$userpass = mysqli_real_escape_string($dbh, $_POST['userpass']);

  
    $query = "UPDATE hackermember SET userpass='$userpass' where userid='$userid'";
   
   

    if(mysqli_query($dbh, $query)){
     echo "<script>alert('비밀번호 변경이 완료되었습니다.'); location.href='index.php' </script>";

    }else{
     echo "<script>alert('fail(사이트 재접속 바랍니다)'); history.back(); </script>";
    }
 
   

  
?>