<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uesrJoin</title>
</head>
<link rel="stylesheet" href="css/background.css">
<link rel="stylesheet" href="css/userJoinCss.css">
<link id="favicon" rel="icon" type="image/x-icon" href="png/network.ico">
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
    
      <form name="register" onsubmit="return check()" action="userJoin_ok.php" method="POST" >
         <div class="bar">
            <h2>Register</h2><br><br><br><br>
               <div class="bar1">
                  <i class="fa fa-user"></i><input type="text" id="userid" name="userid" placeholder="아이디" autocomplete="off" required="">
                  
                  <input type="button" value="Check" onclick="checkid();">
                  <input type="hidden" id="chk_id2" name="chk_id2" value="">
                  <input type="hidden" id="chk_id3" name="chk_id3" value="0">

               </div>
               
               <div class="bar2">
                  <i class="fa fa-unlock-alt"></i><input type="password" id="pass" name="userpass" class="pw" placeholder="비밀번호" autocomplete="off" required="">
               </div>

               <div class="bar2">
                  <i class="fa fa-unlock-alt"></i><input type="password" id="pass2" name="userpass" class="pw" placeholder="비밀번호 확인" autocomplete="off" required="">
                     <span id="alert-success" style="display: none; font-size: 10px; color: #d92742; margin-top: -29px;"><img src="png/check2.png" style="padding: 15px; width: 20px; height: 20px;"></span>
                     <span id="alert-danger" style="display: none; font-size: 10px; color: #d92742; margin-top: -29px;"><img src="png/check3.png" style="padding: 15px; width: 20px; height: 20px;"></span>
               </div>
              
               <div class="bar2">
                  <i class="fa fa-address-book"></i><input type="text" name="username" placeholder="이름" autocomplete="off" required="" >
               </div>
			   
               <div class="bar2">
                  <i class="fa fa-building"></i><input type="text" name="userwork" placeholder="근무지" autocomplete="off" required="" >
               </div>
			   
               <div class="bar2">
                  <i class="fa fa-phone"></i><input type="text" name="usernumber" placeholder="핸드폰 번호" autocomplete="off" required="" style="outline: none;">
               </div>
			   
               <input type="submit" value="Register">
               <br>
               <h3><a href="index.php">Login</a></h3>
               
               
         </div>
      </form>
     
   </body>
<script src="js/checkid.js"></script>
<script src="js/onesubmit.js"></script>
<script>
    $('.pw').focusout(function () {
        var pwd1 = $("#pass").val();
        var pwd2 = $("#pass2").val();
 
        if ( pwd1 != '' && pwd2 == '' ) {
            null;
        } else if (pwd1 == "" && pwd2 == ""){
		 $("#alert-success").css('display', 'none');
         $("#alert-danger").css('display', 'none');
		}		else if (pwd1 != "" || pwd2 != "") {
            if (pwd1 == pwd2) {
                $("#alert-success").css('display', 'inline-block');
                $("#alert-danger").css('display', 'none');
				
				document.getElementById("chk_id3").value = '1';
            } else {
                
                $("#alert-success").css('display', 'none');
                $("#alert-danger").css('display', 'inline-block');
				
				document.getElementById("chk_id3").value = '0';
			
            }
        }
    });
</script>
</html>
<?php
}else{
	echo "<script>location.href='main/main.php'; </script>";
}
?>