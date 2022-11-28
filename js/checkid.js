function checkid(){
			
			var userid = document.getElementById("userid").value;
			if(userid)
			{
				url = "check.php?userid="+userid;
					window.open(url,"chkid","width=500,height=200");
				}else{
					alert("아이디를 입력하세요");
				}
			}
