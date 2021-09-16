<?php
class Home extends Controller
{
      public $postModel;
      public function sayHi()
      {
            $this->view("PageMaster", [
                  'page'=>'home'
            ]);
            if (!(Login::isLoggedIn())) {
                  header("Location: http://localhost:8080/simple-messenger/Account");
            }
            
      }
      public function __construct()
      {
            $this->postModel = $this->model("postModels");
            if (!(Login::isLoggedIn())) {
                  header("Location: http://localhost:8080/simple-messenger/Account");
            }
      }
      public function upNewPost()
      {
            if (isset($_POST['post'])) {
                  if ($_FILES['postimg']['size'] == 0) {
                        $this->postModel->createPost($_POST['postbody'], Login::isLoggedIn());
                  } else {
                        $postid = $this->postModel->createImgPost($_POST['postbody'], Login::isLoggedIn());
                        Image::uploadImage('postimg', "UPDATE posts SET postimg=:postimg WHERE id=:postid", array(':postid' => $postid));
                  }
                  header("Location: http://localhost:8080/simple-messenger/Home");

            }
      }
      
}
