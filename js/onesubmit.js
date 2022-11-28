function check() {

  if(register.chk_id2.value == "") {

    alert("중복확인을 해주세요.");

    register.chk_id2.focus();

    return false;

  }

  else if(register.chk_id2.value == "0") {

    alert("중복확인을 해주세요.");

    register.chk_id2.focus();

    return false;

  }
  
  else if(register.chk_id3.value == "") {

    alert("비밀번호를 확인해주세요");

    register.chk_id3.focus();

    return false;

  }
  
  else if(register.chk_id3.value == "0") {

    alert("비밀번호를 확인해주세요");

    register.chk_id3.focus();

    return false;

  }

  else return true;

}