<?php 
class SinhVienModels extends DB{
      public function GetSV(){
            return "nguyen lala"; 
      }
      public function Tong($a,$b){
            return $a + $b; 
      }
      public function LaySV(){
            $sql = $this->query("SELECT * FROM sinhvien"); 
            return $sql; 
      }
}
?>