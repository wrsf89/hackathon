<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ko">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<link rel="stylesheet" href="css/indexCss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link id="favicon" rel="icon" type="image/x-icon" href="png/network.ico">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
<script type="text/javascript">
	$.backstretch("image/beach5.jpg");
</script>
<body>
    
    

    <div class="login-wrapper">
        <h2>Login</h2>
        <?php 
			   if(!isset($_SESSION['userid']) || !isset($_SESSION['username']))
				    { 
			  ?>
        <form method="post" action="userLogin_ok.php" id="login-form" autocomplete="off">
         <input type="text" id="id" name="userid" placeholder="아이디" required="">
          <input type="password" id="pw" name="userpass" placeholder="패스워드" required="">
            <input type="submit" value="Login" onclick="loginCheck()">
        </form>
        <div class="serach-class">
            <ul>
                <li><i class="fa fa-lock" aria-hidden="true"></i><a class="aClass" href="idFind.php">아이디＊</a></li>
                <li><a class="aClass" href="pwFind.php">비밀번호찾기</a></li>
            </ul>
            
        </div>
        <ul style="float: right;">

          <li> <i class="fa fa-user" aria-hidden="true"></i><a class="aClass2" href="userJoin.php">회원가입</a></li>
      </ul>
      </div>

</body>
</html>

<script>
  function loginCheck(){
    console.log("loginCheck");
   if($("#id").val() == ''){
     alert("아이디가 입력되지 않았습니다.");
     $("#id").focus();
     return false;
   }else if($("#pw").val() == ''){
     alert("비밀번호가 입력되지 않았습니다.");
     $("#pw").focus();
     return false;
   }


  }

</script>
<?php
}else{
	echo "<script>location.href='main/main.php'; </script>";
}
?>