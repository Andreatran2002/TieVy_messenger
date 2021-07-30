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
      
<body onload="updateChat()">
      <!-- menu-left -->
      <?php require_once "./MVC/views/pages/menu.php"; ?>
      <!-- menu-left -->
      <!-- main-page -->
      <div class="page-main">
            <?php require_once "./MVC/views/pages/avatar.php"; ?>
            <?php require_once "./MVC/views/pages/post.php"; ?>
            <!--          <?php

$results = DB::query("SELECT * FROM posts"); 
foreach($results as $post){
      echo 
      "<div style=\"background-color : white; color : black; fontsize: 20px\">
      <p>".$post['postbody']."</p>";
      if ($post['postimg'] != NULL) echo "<img src='".$post['postimg']."/>"; 
      echo "</div>"; 
      
}?> -->
      </div>
      <!-- main-page -->
      <script>
            
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script type="text/javascript" src="./public/js/main.js"></script>
</body>

</html>


<!--  <div class="container" onload="updateChat();">
            <div style="" class="message__area" id="message__area"></div>
            <div class="bottom"><input type="text" name="message__input" 
                class="message__input" id="message__input" onkeydown="if (event.keyCode == 13) sendmsg()" value="" placeholder="Enter your message here ... (Press enter to send message)">
            </div>

      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
      <script type="text/javascript" src="./public/js/main.js"></script> -->