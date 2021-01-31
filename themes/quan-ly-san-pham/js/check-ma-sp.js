var txt = document.getElementById('ma-sp');
var info = document.getElementById('info');
var btnSubmit = document.getElementById("btn-ok");
txt.addEventListener("keyup",validateInputMaSP);
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
                info.innerText="* Mã sản phẩm hợp lệ!";
                info.style.color="green";
            }else{
                info.innerText="* Mã sản phẩm này đã được sử dụng!";
                info.style.color="red";
            }
            
        }
    };
    req.open("GET","?url=SanPham/checkIdAPI/"+txt.value.trim());
    var data = new FormData();
    // data.append("username",txt.value.trim());
    req.send(data);
}
//Hàm Kiểm tra hợp lệ trường username
function validateInputMaSP(e){
    value = txt.value.trim();
    regex = /^([\d]+-){2}[\d]+$/;
    match = value.match(regex);
    // console.log(match);
    console.log(match);
    if(value.length < 5 || value.length>32 || match==null){
        info.innerText="* Mã sản phẩm không hợp lệ!";
        info.style.color="red";
        btnSubmit.disabled="true";
    }
    else{
        ktraTonTai(e);
    }
}
