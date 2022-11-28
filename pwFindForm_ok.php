
<?php

include "db.php";

$userid = mysqli_real_escape_string($dbh, $_POST['userid']);
$usernumber = mysqli_real_escape_string($dbh, $_POST['usernumber']);

if($userid == "" || $usernumber == "")
{
    echo "<script>alert('아이디와 핸드폰 번호를 입력하시오.'); history.back(); </script>";
}else{

    $query = "SELECT * FROM hackermember WHERE userid='$userid' AND usernumber='$usernumber'";
    $query2 = mysqli_query($dbh, $query);
    $data = mysqli_fetch_array($query2);

    $userpass = $data['userpass'];
    $username = $data['username'];

    if($userpass != ''){
      
      echo "<script>location.href='pwFindUpdate.php?userid=".$data['userid']."'; </script>"; 
    
      
   }else{
      echo "<script>alert('회원정보를 찾을 수 없습니다.'); history.back(); </script>";
   }

  }

?>
