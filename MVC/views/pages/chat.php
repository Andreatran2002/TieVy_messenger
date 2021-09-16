<?php
if (isset($_GET['w'])) {
      $userid = $_GET['w'];
      $user_info = DB::query("SELECT * FROM users where id  = :id", array(':id' => $userid))[0];
}
?>
<div class="page-main">
      <div class="body">
            <div class="body__left-container">
                  <div class="body__left-user">
                        <img src="<?php
                                    if (DB::query("SELECT profileimg FROM users WHERE id = :id", array(":id" => $_COOKIE['messageUser']))) {
                                          echo DB::query("SELECT * FROM users WHERE id = :id", array(":id" => $_COOKIE['messageUser']))[0]['profileimg'];
                                    } else echo "./public/images/default_avatar.png"
                                    ?>" alt="" class="body__left-user-image" />
                        <a href="#" class="body__left-user-name">
                              <?php
                              echo DB::query("SELECT * FROM users WHERE id = :id", array(":id" => $_COOKIE['messageUser']))[0]['username'];
                              ?>
                        </a>
                        <div class="menu-search">
                              <ion-icon class="menu-search-icon" name="search-outline"></ion-icon>
                              <input id="search-input" type="text" placeholder="Enter your friend's name" />
                        </div>
                  </div>
                  <div class="body__left">
                        <?php require_once("./MVC/views/pages/userFriend.php") ?>
                  </div>
            </div>
            <div class="body__chatBox">
                  <div class="body__chatBox-header" id="body__chatBox-header">
                        <img src="<?php if (isset($_GET['w'])) echo $user_info['profileimg'];
                                    else echo "./public/images/default_avatar.jpg" ?>" alt="" id="current-friend" class="body__chatBox-header-image" />

                        <a href="#" class="body__chatBox-header-name" id="current-friend-name"><?php if (isset($_GET['w'])) echo $user_info['username'];
                                                                                                else echo "No information" ?></a>
                        <ion-icon name="information-outline" class="body__chatBox-header-help" onclick="cbOption(event)"></ion-icon>

                  </div>
                  <div class="body__chatBox-msgArea " id="message__area" onclick="cbOption(event)">

                  </div>
                  <div class="body__chatBox-input">
                        <input type="text" name="message__input" class="message__input" id="message__input" onkeydown="if (event.keyCode == 13) {sendMsg();}" value="" placeholder="Enter your message here ... (Press enter to send message)" />
                        <ion-icon class="body__chatBox-input-icon" name="rocket-outline" onclick="sendMsg()">
                        </ion-icon>
                  </div>
            </div>
      </div>
</div>



</script>