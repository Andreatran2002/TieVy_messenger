<?php
class Chat extends Controller
{
      public $userModel;
      public $mainView;

      function SayHi()
      {

            $this->mainView = $this->view("PageMaster", [
                  'page' => 'chat'
            ]);
            // echo "<script>alert('".$_GET['username']."')</script>";
      }
      public function __construct()
      {

            if (!(Login::isLoggedIn())) {
                  header("Location: http://localhost:8080/simple-messenger/Account");
            }
            $this->userModel = $this->model("messageModels");
      }
     
}
