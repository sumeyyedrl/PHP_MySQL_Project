<?php
session_start();

require_once "mysql.php";

if (isset($_POST["mail"]) && isset($_POST["sifre"])) { //form çıktısı alındı mı kontrol eder.
    $form_mail = $_POST["mail"];
    $form_sifre = $_POST["sifre"];

    $form_sifre_hash = hash("sha256", $form_sifre);

    $q = mysqli_query($db, "SELECT * FROM author WHERE `mail` = '$form_mail' AND `pass`='$form_sifre_hash'");
    //kullanıcı veri tabanında bulunuyor mu kontrol eder.
    $num = mysqli_num_rows($q);
    if ($num == 0) {
        echo "Yanlış giriş yaptınız!";
        exit();
    } else if ($num == 1) {
        $author = mysqli_fetch_assoc($q);
        $_SESSION['ID'] = $author["author_id"];
        //kullanıcı bulunur ve session başlatılır.
        header("Location: author.php");
    }
} else {
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authorized Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Questrial&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>

    <body cz-shortcut-listen="true">
        <section class="hero is-success is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <h3 class="title has-text-black">Login</h3>
                        <hr class="login-hr">
                        <p class="subtitle has-text-black">Please login to proceed.</p>
                        <div class="box">
                            <form action="author_login.php" method="post">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="email" placeholder="Your Email" name="mail">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="password" placeholder="Your Password" name="sifre">
                                    </div>
                                </div>
                                <button class="button is-block is-info is-large is-fullwidth">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>

<?php
}
?>