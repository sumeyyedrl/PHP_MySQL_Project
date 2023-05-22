<?php

require_once "mysql.php";

$form_id = $_GET["id"];
setcookie("id",$form_id,time()+60);
//id bilgisi getirilir ve paylaşılır.
?>