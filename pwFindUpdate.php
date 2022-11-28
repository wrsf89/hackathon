<?php
 include "db.php";
 $userid = $_GET['userid'];
 

?>
<?php
  if(!isset($userid)) {
    echo "<script>alert('잘못된 경로입니다.'); history.back(); </script>";
  }else{
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pwFindUpdate</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="css/pwFindCss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
<script type="text/javascript">
	$.backstretch("image/beach5.jpg");
</script>
<body>
   
    <div class="pwFind-wrapper">
        <h2>Reset PW</h2>
        <form method="post" onsubmit="return pwUpdateCheck()" action="pwFindUpdateForm_ok.php" id="pwFind-form">
          <input type="hidden" name="userid" value="<?php echo $userid ?>">
          <input type="password" id="pw" name="userpass" placeholder="비밀번호" required="">
          <input type="password" id="pwcheck" name="userpasscheck" placeholder="비밀번호 확인" required="">
          
          <input type="submit" value="비밀번호 변경" />
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
    function pwUpdateCheck(){
      console.log("pwFindCheck");
     var pw = $("#pw").val();
     var pwcheck = $("#pwcheck").val();

    
     
     if(pw != pwcheck){
      alert("비밀번호가 일치하지않습니다.");
      $("#pwcheck").focus();
      return false;
     }
     
  
    }
    
  </script>
  <?php } ?>