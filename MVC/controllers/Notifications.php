<?php
class Notifications extends Controller
{
      public $notifyModel;
      public $userModel;
      public $mainView;

      function SayHi()
      {
            $this->userModel = $this->model('userModels');
            $userAccount = $this->userModel->getUser(Login::isLoggedIn());
            $this->mainView = $this->view("PageMaster", [
                  'page' => 'notify'
                  // ,'listNotify' => $this->showNotify_news()
            ]);
            // echo "<script>alert('".$_GET['username']."')</script>";
      }
      public function __construct()
      {

            if (!(Login::isLoggedIn())) {
                  header("Location: http://localhost:8080/simple-messenger/Account");
            }
      }
      public function showNotify_news()
      {
            echo ' 
            <div class="body">
            <ul class="list" id="notiField">';
            $news = DB::query("SELECT * FROM notifications WHERE receiver =:receiver", array(':receiver' => $_COOKIE['messageUser']));
            foreach ($news as $n) {
                  $sender = DB::query("SELECT * FROM users WHERE id = :id", array(":id" => $n['sender']))[0];
                  if ($n['type'] == 1) {
                        if ($n['extra'] != "") {
                              $extra = json_decode($n['extra']);
                              echo '
                              <li class="list__item">
                              <img src="'.$sender['profileimg'].'" alt=""
                                class="list__item-image">
                              <div class="list__item-content">
                                <p><a href="">'.$sender['username'].'</a> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, laboriosam.
                                </p>
                              </div>
                            </li>';
                        }
                  }
            }
            echo '</ul>
            <div class="box"></div>
            <ul class="list" id="frieField">
            <li class="list__item">
          <img src="https://i.pinimg.com/236x/3b/5b/d7/3b5bd777ed555c88903d5924480de068.jpg" alt=""
            class="list__item-image">
          <div class="list__item-content of-req">
            <p><a href="">Tien dep trai</a> want to become your friend !
            </p>
            <div class="list__item-btnContainer">
              <button class="btn-add">
                <ion-icon name="person-add-outline"></ion-icon> Add
              </button>
              <button class="btn-remove">
                <ion-icon name="person-remove-outline"></ion-icon> Remove
              </button>
            </div>
          </div>
        </li>     
        </ul>
      <h2 id="title-1">Notifications</h2>
      <h2 id="title-2">Friend requests</h2>
      <!-- <ul class="reqfr"></ul> -->
    </div>
  </div>';

      }
      public function edit()
      {
      }
}