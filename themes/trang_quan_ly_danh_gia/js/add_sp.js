function add_sp(){
    list = document.getElementById("list-sp");
    row = document.querySelector(".table-row").cloneNode(true);
    row.classList.remove("hidden");
    // console.log(row);
    list.appendChild(row);
}
function deleteRow(e){
    list = document.getElementById("list-sp");
    // console.log(e.parentNode.parentNode);
    row = e.parentNode.parentNode;
    list.removeChild(row);
}

//hàm xử lí lấy lại danh sách chuyên gia phù hợp để đưa vào select người đánh giá
function getProfessorList(e){
    selected_id = e.value;
    select_san_pham=e.parentNode.parentNode.children[1].children[0];
    select_chuyen_gia=e.parentNode.parentNode.children[2].children[0];
    // console.log(selected_id);
    getDataProductList(selected_id,select_san_pham);
    getDataProfessorList(selected_id,select_chuyen_gia);
    /**
     * TODO:
     * - Dùng kỹ thuật ajax lấy danh sách chuyên gia có chung phân nhóm với id sản phẩm vừa chọn
     * - Đưa dữ liệu thành các option với value và label tương ứng vào trong select
     * - Mặc định là sản phẩm đầu tiên và danh sách chuyên gia tương ứng
     * - có thể sửa thêm cột phân nhóm để giới hạn sản phẩm và chuyên gia
     */
}
function getDataProductList(id,select_san_pham){
    var req = new XMLHttpRequest();
    var str = "";
    req.onreadystatechange= function(){
        if(req.DONE && req.readyState==4) {
            
            // console.log(req.responseText);//info.innerHTML = req.responseText;
            result= req.responseText;
            // try{
            if(result!=""){
                result = JSON.parse(result);
                for(i = 0;i<result.length;i++){
                    select = i==0?"selected":"";
                    str+='<option  value="'+result[i].id+'" '+select+'>'+result[i].ten_sp+'</option>';
                }
            }
            select_san_pham.innerHTML=str;
            // console.log(result);
            // }catch(err){
            //     console.log(err);
            // }
            
            
        }
    };
    req.open("GET","?url=SanPham/getListAPI/"+id);
    req.send();
}

function getDataProfessorList(id,select_chuyen_gia){
    var req = new XMLHttpRequest();
    var str = "";
    req.onreadystatechange= function(){
        if(req.DONE && req.readyState==4) {
            
            // console.log(req.responseText);//info.innerHTML = req.responseText;
            result= req.responseText;
            // try{
            if(result!=""){
                result = JSON.parse(result);
                for(i = 0;i<result.length;i++){
                    select = i==0?"selected":"";
                    str+='<option  value="'+result[i].username+'" '+select+'>'+result[i].ho_ten+'</option>';
                }
            }
            select_chuyen_gia.innerHTML=str;
            console.log(result);
            
        }
    };
    req.open("GET","?url=QuanLyChuyenGia/getListAPI/"+id);
    req.send();
}