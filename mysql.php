<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "donation";

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//sql bağlantısı kurulur.

if (mysqli_connect_errno()) {
    echo "Veri tabanıyla bağlantı kurulamadı!!!";
    exit();
}
?>


<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body></body>
</html>