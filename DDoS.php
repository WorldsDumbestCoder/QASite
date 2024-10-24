<?php
session_start();
if(!isset($_SESSION["MAX_REQUEST"])){
  $_SESSION["MAX_REQUEST"] = 10;
  $_SESSION["REQUESTS_SENT"] = 0;
  $_SESSION["MAX_TIME"] = 50;
}
if(!isset($_COOKIE["BLOCK_REQUEST"]) && time() - $_SESSION["MAX_TIME"] <= 500){
   if($_SESSION["REQUESTS_SENT"] <= $_SESSION["MAX_REQUEST"]){
       $_SESSION["REQUEST_SENT"]++;
   }else{
     http_response_code(403);
     header("HTTP/1.0 403 Forbidden");
     $expires = time() * 2;
     setcookie("BLOCK_REQUEST", true, $expires);
  }
}else{
  http_response_code(403);
  header("HTTP/1.0 403 Forbidden");
  die("Sorry, but you can not access this website for a while");
}
?>
