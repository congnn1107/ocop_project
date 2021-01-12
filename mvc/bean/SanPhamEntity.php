<?php
    class SanPhamEntity{
        function __construct($id,$ten_sp,$chu_the_sx,$dia_chi,$phan_nhom,$hinh_sp="null",$link_ho_so="null")
        {
            $this->id=$id;
            $this->ten_sp=$ten_sp;
            $this->chu_the_sx = $chu_the_sx;
            $this->dia_chi=$dia_chi;
            $this->phan_nhom=$phan_nhom;
            $this->hinh_sp=$hinh_sp;
            $this->link_ho_so=$link_ho_so;
        }
    }