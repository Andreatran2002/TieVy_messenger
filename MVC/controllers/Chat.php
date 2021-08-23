<?php 
      class Chat extends Controller{
            public $userModel ; 
            public $mainView;
            
            function SayHi(){
               
                  $this->mainView = $this->view("main_chat",[
                  ]);  
                  // echo "<script>alert('".$_GET['username']."')</script>";
            }
            public function __construct(  ){
                  
                  if (!(Login::isLoggedIn())){
                  header("Location: http://localhost:8080/simple-messenger/Account"); 
                  }
                  $this->userModel = $this->model("messageModels"); 
            }
            // public function friend(){
            //       $this->userModel = $this->model("messageModels");
                
            //       // echo "<script>alert(".json_encode($id).")</script>";
            // }
            // function Show($a, $b){        
            //       // Call Models
            //       $teo = $this->model("SinhVienModel");
            //       $tong = $teo->Tong($a, $b); // 3
          
            //       // Call Views
            //       $this->view("aodep", [
            //           "Page"=>"news",
            //           "Number"=>$tong,
            //           "Mau"=>"red",
            //           "SoThich"=>["A", "B", "C"],
            //           "SV" => $teo->SinhVien()
            //       ]);
            //   }
            
            
      }
?>