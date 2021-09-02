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
                  </div>
                  <div class="body__left">
                        <?php require_once("./MVC/views/pages/userFriend.php") ?>
                  </div>
            </div>
            <div class="body__chatBox">
                  <div class="body__chatBox-header" id="body__chatBox-header" >
                        <img src="./public/images/default_avatar.jpg" alt="" id="current-friend" class="body__chatBox-header-image"  />
                        
                        <a href="#" class="body__chatBox-header-name" id="current-friend-name" >Not found</a>
                         <ion-icon name="information-outline" class="body__chatBox-header-help"  onclick="cbOption(event)" ></ion-icon> 
                      
                  </div>
                  <div class="body__chatBox-msgArea " id="message__area"  onclick="cbOption(event)">

                  </div>
                  <div class="body__chatBox-input">
                        <input type="text" name="message__input" class="message__input" id="message__input" onkeydown="if (event.keyCode == 13) {sendMsg();}" value="" placeholder="Enter your message here ... (Press enter to send message)" />
                        <ion-icon class="body__chatBox-input-icon" name="rocket-outline" onclick="sendMsg()" >
                        </ion-icon>
                  </div>
                  <div id="option-chatbox" class="body__chatBox-options">
                        <img src="https://i.pinimg.com/564x/c5/0d/4c/c50d4cb137b60c361b73c05164d31045.jpg" alt="" id="option-avatar">
                        <a href="#" class="option-item option-user">LOKI</a>
                        <a href="#" class="option-item">
                              <ion-icon name="trash-outline"></ion-icon>
                              <p>Remove this conversations</p>
                        </a>
                        <a href="#" class="option-item">
                              <ion-icon name="ban-outline"></ion-icon>
                              <p>Block this user</p>
                        </a>
                        <a href="#" class="option-item">
                              <ion-icon name="person-outline"></ion-icon>
                              <p>Visit profile</p>
                        </a>
                        <a href="#" class="option-item">
                              <ion-icon name="arrow-undo-outline"></ion-icon>
                              <p>Share User's URL</p>
                        </a>
                        <a href="#" class="option-item">
                              <ion-icon name="alert-outline"></ion-icon>
                              <p>Send a report</p>
                        </a>
                  </div>
            </div>
      </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" src="./public/js/main.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="./public/js/chat.js">

</script>
