<?php		

	include "db.php";

    function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
}

		$ip_address;
		$ip_address = get_client_ip();
	
	
	
        $userid = mysqli_real_escape_string($dbh, $_POST['userid']);
        $userpass = mysqli_real_escape_string($dbh, $_POST['userpass']);
        $username = mysqli_real_escape_string($dbh, $_POST['username']);
        $userwork = mysqli_real_escape_string($dbh, $_POST['userwork']);
        $usernumber = mysqli_real_escape_string($dbh, $_POST['usernumber']);
	
	
	
        if($userid == "" || $userpass == "" || $username == "" || $userwork == "" || $usernumber == "")
        {
            echo "<script>alert('모두 기입해주세요.'); history.back(); </script>";
        }else{
            
            $query = "INSERT INTO hackermember (userid, userpass, username, userwork, usernumber, ip) values ('$userid', '$userpass', '$username', '$userwork', '$usernumber', '$ip_address')";
            
                if(mysqli_query($dbh, $query))
                {
                    echo "<script>alert('가입 완료'); location.href='index.php'; </script>";
                }else{
                    echo "<script>alert('fail(사이트 재접속 바랍니다)'); history.back(); </script>";
                    
                }
        }
	
?>
