<?php 
      class Profile extends Controller{
            public $notifyModel ; 
            public $userModel; 
            public $mainView;
            
            function SayHi(){
                  $this->userModel = $this->model('userModels');
                  $userAccount = $this->userModel->getUser(Login::isLoggedIn());
                  $this->mainView = $this->view("editProfile",[
                        'img'=> $userAccount['profileimg'],
                        'username'=>$userAccount['username'],
                        'phone'=>$userAccount['phone'],
                        'education'=>$userAccount['education'],
                        'address'=>$userAccount['address'],
                        'ig_address'=>$userAccount['instagram_address'],
                        'email'=>$userAccount['email'],
                        'birthday'=>$userAccount['birthday']
                  ]);  
                  // echo "<script>alert('".$_GET['username']."')</script>";
            }
            public function __construct(  ){
                  
                  if (!(Login::isLoggedIn())){
                  header("Location: http://localhost:8080/simple-messenger/Account"); 
                  }
                  $this->userModel = $this->model("notifyModels"); 
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