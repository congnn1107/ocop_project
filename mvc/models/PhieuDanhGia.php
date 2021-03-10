<?php
    class PhieuDanhGia extends DB{        
        function __construct(){
            parent::__construct();
        }

        /**
         * Hàm đưa ra mảng kết hợp các thành phần tạo nên 1 phiếu chấm điểm
         * Note: lỗi ở các nhóm không có tiêu chí con (12/11/2020)-> solved
         */
        function get($id){
            $sql = "select distinct id_phan, phan from tb_bo_tieu_chi where id='$id'";
            
            $parts = $this->executeQuery($sql);
            // Xử lí đưa ra object phiếu chấm điểm
            
            // echo "<br>";
            $result=[];
            //duyệt từng phần
            foreach($parts as $part){
                $partRow = [
                    "id"=>$part["id_phan"],
                    "content" =>$part["phan"]
                ];

                //lấy ra và duyệt từng nhóm tiêu chí theo phần
                $sql = "select distinct id_nhom_tc,nhom_tc from tb_bo_tieu_chi where id = '$id' and id_phan = '".$partRow['id']."' ";
                $groups = $this->executeQuery($sql);
               
                $groupSet=[];
                foreach($groups as $group){
                    $groupRow = [
                        'id' =>$group["id_nhom_tc"],
                        'content' => $group["nhom_tc"]
                    ];

                    //lấy ra và duyệt từng tiêu chí theo nhóm tiêu chí
                    $sql = "select distinct id_tieu_chi,tieu_chi from tb_bo_tieu_chi where id = '$id' and id_phan = '".$partRow['id']."' and id_nhom_tc = '".$groupRow['id']."'";
                    $cacTieuChi = $this->executeQuery($sql);
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
                        $choices = $this->executeQuery($sql);
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

        //Begin Update bộ tiêu chí bằng excel
        /**
         * 
         * 
         */
        function UpdateBoTC(){
            //Nhận file excel upload
            $file = $_FILES['file-upload'];
            $file = uploadExcel($file);
            // var_dump($file);
            //đọc file//đưa vào db
            if($file!=false){
                $this->readExcel($file);
            }
            else{
                return false;
            }
            //xóa file
            if(deleteFile($file)!=1) return false;
            //trả kết quả

            return true;
        }
        private function readExcel($file){
            if(!class_exists("PHPExcel_IOFactory")){
                include_once('./mvc/core/Excel/PHPExcel.php');
            }
            $excel = PHPExcel_IOFactory::load($file);
            $sheetCount = $excel->getSheetCount();
            //echo $sheetCount;
            $this->clear();
            for($i=0;$i<$sheetCount;$i++){
                $excel->setActiveSheetIndex($i);
                $worksheet = $excel->getActiveSheet();
                $this->importDataFromSheet($worksheet,$i);
            }

            return true;
            
    
        }
        function import($row){
            $sql = "insert tb_bo_tieu_chi(id,id_phan,phan,id_nhom_tc,nhom_tc,id_tieu_chi,tieu_chi,id_lua_chon,lua_chon,diem)
                values('$row[0]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]',$row[10])";
            //echo $sql;
            $result = $this->executeQuery($sql);
            return $result;
            // if($result){
            //     return $result;
            // }else echo $this->conn->error."\n SQL: $sql\n". var_dump($row)."\n";
        }
        private function importDataFromSheet($worksheet,$idSheet){
            $highestColumn = $worksheet->getHighestDataColumn();
            //trường hợp không nhận diện được
            if($highestColumn!='F') $highestColumn='F';
            $n = PHPExcel_Cell::columnIndexFromString($highestColumn);
            $m = $worksheet->getHighestDataRow($highestColumn);
     
            //hàng lấy từ 1, cột lấy từ 0
            $id = [$idSheet,0,0,0,0];
            $content = ['','','','','',''];
            $flag=0;
            for($i = 2; $i<=$m;$i++){
                $row =[];
                for($j = 0;$j<$n;$j++){
                    //lấy dữ liệu từ ô hàng j cột i
                    $data = $worksheet->getCellByColumnAndRow($j,$i)->getValue();
    
                    //nếu có dữ liệu thì sẽ gán vào biến lưu trữ
                    if($data!=NULL){
                        $content[$j] = $data;
    
                        //tăng id của cột hiện tại lên 1 và id cột con của nó về 0
                        $id[$j]++;
                        $id[$j+1]=0;
    
                    };
                    //trường hợp gặp cột cuối (cột điểm )
                    if($j==$n-1){
                        $content[$j] = $data;
                       // echo $content[$j];
                        // if($content[$j]==NULL) echo $worksheet->getCellByColumnAndRow($j,$i)->getValue()."\n";
                    }
    
                    $flag=$j;
                    if($j<$n-1) $row[]= $id[$flag];
    
                    $row[] = $content[$j];
    
                    if($flag==count($id)-1) $flag=0;
    
    
                }
                $this->import($row);
            }
            //if($idSheet==1) echo 'ID bộ:'.$id[0].", Columns: $highestColumn, Rows: $m\n";
            // echo "\nSheet $idSheet - Done!\n";
        }

        private function clear(){
            global $conn;
            $sql = 'delete from tb_bo_tieu_chi';
            if($this->executeQuery($sql)==true){
                return true;
            }else{
                // echo $this->conn->error;
                return false;
            }
            
    
        }
        //End update bộ tiêu chí bằng excel
        /**
         * 
         * 
         */

        function layDS(){
            $sql = "SELECT id_phan_nhom,ten_phan_nhom FROM `tb_phan_nhom_sp` WHERE 1";
            $result = $this->executeQuery($sql);
            return $result;
        }
        function getName($id){
            $sql = "select ten_phan_nhom from tb_phan_nhom_sp where id_phan_nhom = '$id' limit 1";
            $result = $this->executeQuery($sql);
            return $result->fetch_row()[0];
        }

        //Xu ly thanh json
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