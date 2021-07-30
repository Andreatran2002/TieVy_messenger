<?php 
      class Chat extends Controller{
            public $userModel ; 
            public $mainView;
            
            function SayHi(){
                  $this->userModel = $this->model("messageModels"); 
            }
            public function __construct(){
                  
                  if (!(Login::isLoggedIn())){
                  header("Location: http://localhost/simple-messenger/Account"); 
                  }
                  $this->mainView = $this->view("main_chat"); 
            }
            
      }
?>