<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pwFind</title> 
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="css/pwFindCss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
<script type="text/javascript">
	$.backstretch("image/beach5.jpg");
</script>
<body>
   
        <?php 
			    if(!isset($_SESSION['userid']) || !isset($_SESSION['username']))
				      { 
			  ?>
    <div class="pwFind-wrapper">
        <h2>Find PW</h2>
        <form method="post" action="pwFindForm_ok.php" id="pwFind-form">
         <input type="text" id="id" name="userid" placeholder="아이디" required="">
          <input type="text" id="phone" name="usernumber" placeholder="전화번호" required="">
            <input type="submit" value="비밀번호 찾기" onclick="pwFindCheck()"/>
        </form>
        <div class="serach-class" style="float: left;">
          <ul>
              
              <li><i class="fa fa-lock" aria-hidden="true"></i><a class="aClass" style="margin-left: 6px; text-decoration: none;" href="idFind.php">아이디 찾기</a></li>
          </ul>
          
      </div>
        <ul style="float: right; ">
          <li><i class="fa fa-user" aria-hidden="true"></i><a class="aClass2" style="margin-left: 6px; text-decoration: none;" href="index.php">로그인＊</a></li>
          <li><a class="aClass2" style="text-decoration: none;" href="userJoin.php">회원가입</a></li>
        </ul>
    </div>

    
  </body>
</html>

<script>
    function pwFindCheck(){
      console.log("pwFindCheck");
     if($("#id").val() == ''){
       alert("아이디가 입력되지 않았습니다.");
       $("#id").focus();
       return false;
     }else if($("#phone").val() == ''){
       alert("핸드폰번호가 입력되지 않았습니다.");
       $("#phone").focus();
       return false;
     }
  
  
    }
    
  </script>
  <?php
    }else{
      echo "<script>location.href='main/main.php'; </script>";
    }
  ?>