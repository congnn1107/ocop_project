<?php
    echo "<pre>";
    require_once "Excel/PHPExcel.php";
    //require_once "./Excel/PHPExcel/IOFactory.php";

    $conn = new mysqli('localhost','nncpro','ngoccong98','OCOP_DB');
    $conn->set_charset("UTF8");

    function clear(){
        global $conn;
        $sql = 'delete from tb_bo_tieu_chi';
        if($conn->query($sql)==true){
            return true;
        }else{
            echo $conn->error;
            return false;
        }
        

    }
    function import($row){
        global $conn;
        $sql = "insert tb_bo_tieu_chi(id,id_phan,phan,id_nhom_tc,nhom_tc,id_tieu_chi,tieu_chi,id_lua_chon,lua_chon,diem)
            values('$row[0]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]',$row[10])";
        //echo $sql;
        $result = $conn->query($sql);
        if($result){
            return $result;
        }else echo $conn->error."\n SQL: $sql\n". var_dump($row)."\n";
    }

    function importDataFromSheet($worksheet,$idSheet){
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
            import($row);
        }
        //if($idSheet==1) echo 'ID bộ:'.$id[0].", Columns: $highestColumn, Rows: $m\n";
        echo "\nSheet $idSheet - Done!\n";
    }
    function readExcel(){
        $excel = PHPExcel_IOFactory::load('C:\Users\ngocc\Downloads\cau_truc_data_test.xlsx');
        $sheetCount = $excel->getSheetCount();
        //echo $sheetCount;
        clear();
        for($i=0;$i<$sheetCount;$i++){
            $excel->setActiveSheetIndex($i);
            $worksheet = $excel->getActiveSheet();
            importDataFromSheet($worksheet,$i);
        }
        

    }


    $tenHam = "readExcel";
    $tenHam();
    $conn->close();
    echo "</pre>";
?>
