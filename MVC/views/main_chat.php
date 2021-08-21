<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
      <title>TiVy</title>
      <link rel="stylesheet" href="./public/css/reset.css" />
      <link rel="stylesheet" href="./public/css/menu-left.css" />
      <link rel="stylesheet" href="./public/css/chatView.css" />
</head>

<body onload=" constructUser();updateStatus(); updateChat(); ">
      <!-- menu-left -->
      <?php require_once "./MVC/views/pages/menu.php"; ?>
      <!-- menu-left -->
      <!-- main-page -->
      <div class="page-main">
            <div class="body">
                  <div class="body__left-container">
                        <div class="body__left-user">
                              <img src="<?php
                                          if (DB::query("SELECT profileimg FROM users WHERE username = :username", array(":username" => $_COOKIE['messageUser']))) {
                                                echo DB::query("SELECT * FROM users WHERE username = :username", array(":username" => $_COOKIE['messageUser']))[0]['profileimg'];
                                          } else echo "./public/images/default_avatar.png"
                                          ?>" alt="" class="body__left-user-image" />
                              <a href="#" class="body__left-user-name"><?php echo $_COOKIE['messageUser'] ?></a>
                        </div>
                        <div class="body__left">
                              <?php require_once("./MVC/views/pages/userFriend.php") ?>
                        </div>
                  </div>
                  <div class="body__chatBox">
                        <div class="body__chatBox-header" id="body__chatBox-header">
                              <img src="" alt="" id="current-friend" class="body__chatBox-header-image" />
                              <a href="#" class="body__chatBox-header-name" id="current-friend-name"></a>
                              <ion-icon name="information-outline" class="body__chatBox-header-help"></ion-icon>
                        </div>
                        <div class="body__chatBox-msgArea " id="message__area">

                        </div>
                        <div class="body__chatBox-input">
                              <input type="text" name="message__input" class="message__input" id="message__input" onkeydown="if (event.keyCode == 13) {sendMsg();}" value="" placeholder="Enter your message here ... (Press enter to send message)" />
                              <ion-icon class="body__chatBox-input-icon" name="rocket-outline" onclick="sendMsg()"></ion-icon>
                        </div>
                  </div>
            </div>
      </div>
      <!-- main-page -->
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script type="text/javascript" src="./public/js/main.js"></script>
      <script src="./public/js/home.js" defer></script>
      <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
      <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('6d26d8d2ff0bf9b79d49', {
                  cluster: 'ap1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                  // alert(JSON.stringify(data));
              
                  if (data['request'] == "message") {
                        var username = getcookie("messageUser");
                        var output = "";
                        $.post("./Ajax/updateMessage", {
                              receiver: receiver
                        }, function(data) {

                              var response = data.split("\n");
                              var rl = response.length;
                              var item = "";
                              for (var i = 0; i < rl; i++) {
                                    item = response[i].split('\\')
                                    if (item[1] != undefined) {
                                          if (item[0] == username) {
                                                output += "<div class=\"body__chatBox-msgArea-item sent\">" + item[1] + " </div>";
                                          } else {
                                                output += "<div class=\"body__chatBox-msgArea-item receive\">" + item[1] + " </div>";
                                          }
                                    }
                              }
                              $("#message__area").html(output);
                              message__area.scrollTop = message__area.scrollHeight;
                        });
                  }

                  
            });
      </script>

</body>

</html>