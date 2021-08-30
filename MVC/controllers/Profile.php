<?php 
      class Profile extends Controller{
            public $notifyModel ; 
            public $userModel; 
            public $mainView;
            
            function SayHi(){
                  $this->userModel = $this->model('userModels');
                  $userAccount = $this->userModel->getUser(Login::isLoggedIn());
                  $this->mainView = $this->view("PageMaster",[
                        'page' =>'profile',
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
            public function edit(){
                  if (isset($_POST['editProfile'])){
                        $id= Login::isLoggedIn();
                        $username = $_POST['username'];
                        $birthday = $_POST['birthday'];
                        $phone = $_POST['phone']; 
                        $education = $_POST['education'];
                        $address = $_POST['address'];
                        $ig_address = $_POST['ig_address'];
                        DB::query('UPDATE users SET 
                        username = :username,
                        birthday = :birthday,
                        phone = :phone,
                        education = :education,
                        address = :address,
                        instagram_address = :ig_address
                        WHERE id = :id
                        ',array(
                              ":id" => $id,
                              ":username"=>$username,
                              ":birthday"=>$birthday,
                              ":phone"=>$phone,
                              ":education"=>$education,
                              ":address"=>$address,
                              ":ig_address"=>$ig_address
                        ));
                        if ($_FILES['profileimg']['size'] > 0){
                              Image::uploadImage('profileimg','UPDATE users SET profileimg = :profileimg WHERE id = :userid',array(':userid'=>$id));
                        }
                        header('Location: http://localhost:8080/simple-messenger/Profile'); 
                  }
            }
            
            
      }
?>