<?php
	
	session_start();
	
	include "db.php";
	
	$id = mysqli_real_escape_string($dbh, $_POST['userid']);
	$pw = mysqli_real_escape_string($dbh, $_POST['userpass']);
	
	if($id == "" || $pw == "")
		{
			echo "<script>alert('아이디와 비번을 입력하시오.'); history.back(); </script>";
		}else{
			
			$query = "select * from hackermember where userid='".$id."' and userpass='".$pw."'";
			$fetch = mysqli_query($dbh, $query);
			$data = mysqli_fetch_array($fetch);
			
				if($id == $data['userid'] && $pw == $data['userpass'])
					{
						$_SESSION['userid'] = $data['userid'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['userwork'] = $data['userwork'];
						
						echo "<script>location.href='main/main.php'; </script>";
					}else{
						echo "<script>alert('로그인 정보가 일치하지 않습니다.'); history.back(); </script>";
						
					}
				}
?>
