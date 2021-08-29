<?php 
      class Notifications extends Controller{
            public $notifyModel ; 
            public $userModel; 
            public $mainView;
            
            function SayHi(){
                  $this->userModel = $this->model('userModels');
                  $userAccount = $this->userModel->getUser(Login::isLoggedIn());
                  $this->mainView = $this->view("PageMaster",[
                        'page' => 'notify'
                  ]);  
                  // echo "<script>alert('".$_GET['username']."')</script>";
            }
            public function __construct(  ){
                  
                  if (!(Login::isLoggedIn())){
                  header("Location: http://localhost:8080/simple-messenger/Account"); 
                  }
                  
            }
            public function edit(){
                  
                  
            }
            
            
      }
?>