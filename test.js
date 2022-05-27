function check(form) {

    if(form.userid.valu="hallym") {
        if(form.password.value=="1234") {
            alert("로그인 성공!");
            window.location.href = "index.html";
        } else{
            alert("비밀번호를 확인해주세요");
        }
    } else {
        alert("아이디를 확인해주세요");
    }
}

