<?php
    class PhieuDanhGia extends DB{        
        function __construct(){
            parent::__construct();
        }

        /**
         * Hàm đưa ra mảng kết hợp các thành phần tạo nên 1 phiếu chấm điểm
         * Note: lỗi ở các nhóm không có tiêu chí con (12/11/2020)
         */
        function get($id){
            $sql = "select distinct id_phan, phan from tb_bo_tieu_chi where id='$id'";
            
            $parts = $this->select($sql);
            // Xử lí đưa ra object phiếu chấm điểm
            
            echo "<br>";
            $result=[];
            //duyệt từng phần
            foreach($parts as $part){
                $partRow = [
                    "id"=>$part["id_phan"],
                    "content" =>$part["phan"]
                ];

                //lấy ra và duyệt từng nhóm tiêu chí theo phần
                $sql = "select distinct id_nhom_tc,nhom_tc from tb_bo_tieu_chi where id = '$id' and id_phan = '".$partRow['id']."' ";
                $groups = $this->select($sql);
               
                $groupSet=[];
                foreach($groups as $group){
                    $groupRow = [
                        'id' =>$group["id_nhom_tc"],
                        'content' => $group["nhom_tc"]
                    ];

                    //lấy ra và duyệt từng tiêu chí theo nhóm tiêu chí
                    $sql = "select distinct id_tieu_chi,tieu_chi from tb_bo_tieu_chi where id = '$id' and id_phan = '".$partRow['id']."' and id_nhom_tc = '".$groupRow['id']."'";
                    $cacTieuChi = $this->select($sql);
                    $tieuChiSet=[];
                    foreach($cacTieuChi as $tieuChi){
                        $tieuChiRow=[
                            'id' => $tieuChi['id_tieu_chi'],
                            'content' => $tieuChi['tieu_chi']
                        ];

                        //lấy ra các lựa chọn theo từng tiêu chí
                        $sql = "select id_lua_chon, lua_chon, diem from tb_bo_tieu_chi where id = '$id'
                            and id_phan = '".$partRow['id']."' and id_nhom_tc = '".$groupRow['id']."'
                            and id_tieu_chi = '".$tieuChiRow['id']."'
                            ";
                        $choices = $this->select($sql);
                        $choiceSet=[];
                        foreach($choices as $choice){
                            $choiceRow = [
                                'id' => $choice['id_lua_chon'],
                                'content' => $choice['lua_chon'],
                                'score' => $choice['diem']
                            ];
                            $choiceSet[]=$choiceRow;
                        }
                        $tieuChiRow['choices'] =$choiceSet;
                        $tieuChiSet[]=$tieuChiRow;

                    }
                    $groupRow["children"] = $tieuChiSet;
                    $groupSet[] = $groupRow;
                }
                $partRow["children"] = $groupSet;

                $result[] = $partRow;
            }
            //print_r(json_encode($result,JSON_UNESCAPED_UNICODE));


            return $result;
            //$this->Process($dataSet);

            
        }

        function Process($dataSet){
            $temp = [];
            $luaChon =[];
            $tieuChi=[];

            $idPhan = 1; $idNhomTC = 1; $idTC=1; $oldId=0;

            for($i = 0; $i<$dataSet->num_rows;$i++){

                $row = $dataSet->fetch_row();
                //echo $row[5];
                if($idTC==$row[5]){
                    //chi tiết từng lựa chọn
                    $ctLuaChon=[
                        "id"=>$row[7],
                        "content" =>$row[8]
                    ];
                    $luaChon[] = $ctLuaChon;

                }
                if($idTC!=$row[5]){
                    //reset bộ lựa chọn để sang tiêu chí mới
                    // print_r("<pre>");
                    // print_r($luaChon);
                    // print_r("</pre>");

                    $tieuChi[$idTC-1]["choices"]=$luaChon;//thêm bộ lựa chọn cho từng tiêu chí
                    $luaChon=[];
                    $idTC=$row[5];

                    //xử lí trường hợp lựa chọn đầu tiên của chỉ tiêu tiếp theo
                    $ctLuaChon=[
                        "id"=>$row[7],
                        "content" =>$row[8]
                    ];
                    $luaChon[] = $ctLuaChon;
                }

               //tiêu chí
               if($oldId<$row[5]){
                   $ctTieuChi=[
                        "id"=>$row[5],
                        "content" => $row[6],
                   ];
                   $tieuChi[] = $ctTieuChi;
               }

               $oldId=$row[5];
               if($idNhomTC!=$row[3]){
                    print_r("<pre>");
                    print_r($tieuChi);
                    print_r("</pre>");
                   $tieuChi=[];
                   $idNhomTC=$row[3];
                   $oldId=0;
               }

            }

            return $row;
        }

    }