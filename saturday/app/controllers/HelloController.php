<?php


class HelloController extends ControllerBase {
    public function indexAction() {
        echo "hello222222 ";
        exit();
       $rows = OcCategory::find(); 
       
        $result = json_encode($rows);
     //   echo $result;
        
       
//        $count=1;
//        foreach ($rows as $row) {
//            $result = json_encode($row); //chuyển một mảng trong PHP hoặc object trong PHP thành chuỗi JSON. 
//            // Cú pháp như sau: json_encode($array), trong đó $array là mảng ban muốn chuyển đổi. 
//            // Kết quả chuỗi JSON sẽ tự động chuyển các ký tự có dấu, các ký tự đặc biệt sang dạng an toàn 
//            echo $result;
//            $count++;
//            if($count>3) break;
//        }
//        exit;
        $this->view->setVar("a", $rows); // truyền dữ liệu từ controller sang view : $this->view->setVar('name', $data).
                                           // Lúc này bên view bạn sẽ có một biến $name.
    }

    public function saturdayAction() {
       // $b=$OcCategory['category_id'];
       // $b=34;
        $rows = OcCategory::find("date_added = '2009-01-05 21:49:43'
");
       // $rows = OcCategory::find("$b");
         $result = json_encode($rows);
          $this->view->setVar("a", $rows); 
    }
    public function saturday2Action(){
        $rows = OcCategory::find2();
          //$result = json_encode($rows);
          $this->view->setVar("a", $rows); 
    }
     public function saturday3Action(){
        $rows = OcCategoryDescription::find3();
          //$result = json_encode($rows);
          $this->view->setVar("a", $rows); 
    }
    public function testAction(){
        echo "hihi";
        exit;
    }
}
    