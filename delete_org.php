<?php
session_start();

require_once "mysql.php";


if(isset($_GET["id"])){ //id bilgisi alındı mı kontrol eder.
    $form_id = $_GET["id"];

    mysqli_query($db,"DELETE FROM `organizations` WHERE `org_id`='$form_id'");
    //id bilgisine göre kurum silinir.

    if (mysqli_errno($db) != 0) {
        exit();
    }
    header("Location: author.php");
}

?>