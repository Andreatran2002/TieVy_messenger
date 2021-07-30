<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
            div{
                  padding : 20px; 
                  height : 200px; 
            }
            header,footer{
                  background-color : red; 
                  height : 200px;
            }
      </style>
</head>
<body>
      <header>
      </header>
      <div id="content"> 
            <?php 
                  require_once "./mvc/views/pages/".$data['Page'].".php"
            ?>
      </div>
      <footer></footer>
</body>
</html>