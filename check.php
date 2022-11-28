<?php

	include "db.php";

	$userid = $_GET["userid"];

	$query = "select * from hackermember where userid='$userid'";
	$sql = mysqli_query($dbh, $query);
	$member = mysqli_fetch_array($sql);

	if($member==0)
	{
?>
<html>
<head>
<link rel="stylesheet" href="css/cscs.css">
<script type="text/javascript">
function send(){
    window.opener.document.getElementById("chk_id2").value = '1';
    window.opener.document.getElementById("userid").readOnly = true;
	
	var x = window.opener.document.getElementById("userid");
	  x.style.color = "gray"; 
	  x.style.fontWeight = "bold";
	  x.style.cursor = "default";

	alert("중복 확인");
	window.close();
}
</script>
</head>
<script src="readonly.js"></script>
<div class="cscs">
<b>	<div style='font-family:"malgun gothic"';><?php echo $userid; ?> 는 사용가능한 아이디입니다.</div></b>
<br>
	<div class="good1" style="display: inline-block;">
        <input type="button" id="good" onclick="send();" value="사용하기">
    </div>
        <input type="button" onclick="window.close()" value="닫기">
</div>
<?php 
	}else{
?>
<link rel="stylesheet" href="css/cscs.css">
<script type="text/javascript">
function chack(){
    window.opener.document.getElementById("chk_id2").value = '0';
	
	window.close();
}	

</script>
<div class="cscs">
	<b><div style='font-family:"malgun gothic"; color:red;'><?php echo $userid; ?> 중복된아이디입니다.</div></b>
	<br>
	<input type="button" onclick="chack();" value="닫기" >
</div>
<?php
	}
?>
<script src="readonly.js"></script>
</html>
