<?php

$db_host = "sql200.epizy.com";
$db_user = "epiz_34261444";
$db_pass = "LNX8GVckdDL";
$db_name = "epiz_34261444_donation";

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($db,"utf8");
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