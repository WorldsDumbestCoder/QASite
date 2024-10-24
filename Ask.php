<?php
  if($_REQUEST["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["QUESTION_BODY"]) && isset($_POST["QUESTION_TITLE"])){
      $question_body = htmlspecialchars_encode($_POST["QUESTION"]);
      $question_title = htmlspecialchars_encode($_POST["QUESTION_TITLE"]);
      $url = array(
        "title" => $question_title,
        "username" => null,
      );
      $newURL = http_build_query("view.php?" . $url);
    }
  }else{
    die("Request Method Not Allowed");
  }
?>
