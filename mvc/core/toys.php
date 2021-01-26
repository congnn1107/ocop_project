<?php

/**
 * Hàm upload ảnh vào thư mục ./asset/image/upload
 * @param image file
 * @return string image path if success
 * @return bool false if failure
 */
function uploadImage($img){
    $target_path = "./asset/image/upload/";
    $target_file = $target_path.$img['name'];
    if(move_uploaded_file($img['tmp_name'],$target_file)){
        return $target_file;
    }
    return false;
}
function uploadHinhSP($img){
    $target_path = "./asset/image/upload/product/";
    $target_file = $target_path.$img['name'];
    if(move_uploaded_file($img['tmp_name'],$target_file)){
        return $target_file;
    }
    return false;
}
function deleteFile($file_name){
    if(file_exists($file_name)){
        if(unlink($file_name)){
            return 1;
        }else{
            -1;
        }
    }
    return 2;
}