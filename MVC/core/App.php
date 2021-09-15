<?php 
      class App{
            protected $controller="Account"; 
            protected $action="sayHi"; 
            protected $params=[]; 
            function __construct(){
            
      
                  $arr = $this->UrlProcess();
                  // if (isset($_GET['w'])) echo "<script>alert('".$_GET['w']."')</script>"; 
                  // Xu ly controller
                  if (isset($arr[0])){
                  if (file_exists("./mvc/controllers/".$arr[0].".php")){
                        $this->controller = $arr[0];
                         
                  }
                  unset($arr[0]);
            }
                  require_once "./mvc/controllers/".$this->controller.".php";
                  $this->controller = new $this->controller; 
                  // Xu ly action 
                 
                  if (isset($arr[1])){
                        if (method_exists($this->controller,$arr[1])){ // Kiem tra function co ton tai
                              $this->action = $arr[1];  
                              
                        }
                        unset($arr[1]);
                  }
                
                  // Xu ly params 
                  //echo "<script>alert('".$this->action."'); </script>";
                  $this->params = $arr?array_values($arr) : [] ; //
                  call_user_func_array([$this->controller,$this->action],$this->params);
            }

            function UrlProcess(){
                  if (isset($_GET['url'])){
                        // Cắt thanh url 
                        return explode("/",filter_var(trim($_GET['url'],"/")));
                        

                  }

            }
      }
?>