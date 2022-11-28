
<?php

  include "db.php";

  $username = mysqli_real_escape_string($dbh, $_POST['username']);
  $usernumber = mysqli_real_escape_string($dbh, $_POST['usernumber']);

  if($username == "" || $usernumber == "")
  {
      echo "<script>alert('이름과 핸드폰 번호를 입력하시오.'); history.back(); </script>";
  }else{

      $query = "SELECT * FROM hackermember WHERE username='$username' AND usernumber='$usernumber'";
      $query2 = mysqli_query($dbh, $query);
      $data = mysqli_fetch_array($query2);

      $userid = $data['userid'];
      $username = $data['username'];

      if($userid != ''){
        
        echo "<script>alert('$username 님의 아이디는 $userid 입니다'); location.href='index.php'; </script>"; 
        
        
        
     }else{
        echo "<script>alert('회원정보를 찾을 수 없습니다.'); history.back(); </script>";
     }

    }

?>
