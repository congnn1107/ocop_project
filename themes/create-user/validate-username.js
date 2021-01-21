var txt = document.getElementById('username');
var info = document.getElementById('info');
var btnSubmit = document.getElementById("btn-ok");
txt.addEventListener("keyup",validateInputUserName);
//setInterval(autosave, 3000);

//AJAX
function ktraTonTai(e){
    // console.log(e);
    var req = new XMLHttpRequest();
    req.onreadystatechange= function(){
        if(req.DONE && req.readyState==4) {
            
            // console.log(req.responseText);//info.innerHTML = req.responseText;
            result= req.responseText=="true"?true:false;
            btnSubmit.disabled = result;
            if(!result){
                info.innerText="* Username hợp lệ";
                info.style.color="green";
            }else{
                info.innerText="* Username này đã có người sử dụng";
                info.style.color="red";
            }
            
        }
    };
    req.open("POST","?url=User/checkUsernameAPI");
    var data = new FormData();
    data.append("username",txt.value.trim());
    req.send(data);
}
//Hàm Kiểm tra hợp lệ trường username
function validateInputUserName(e){
    value = txt.value.trim();
    regex = new RegExp("^[A-Za-z][A-Za-z0-9]*")
    match = regex.test(value);
    // console.log(match);
    if(value.length < 5 || value.length>32 || match==false){
        info.innerText="* Username không hợp lệ!";
        info.style.color="red";
        btnSubmit.disabled="true";
    }
    else{
        ktraTonTai(e);
    }
}
