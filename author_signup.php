<?php

require_once "mysql.php";

if (isset($_POST["ad"]) && isset($_POST["soyad"]) && isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["sifre"])) { //form çıktısı alındı mı kontrol eder.
    $form_ad = $_POST["ad"];
    $form_soyad = $_POST["soyad"];
    $form_sifre = $_POST["sifre"];
    $form_mail = $_POST["mail"];
    $form_tel = $_POST["tel"];

    $form_sifre_hash = hash("sha256", $form_sifre);

    mysqli_query($db, "INSERT INTO `author` (`name`,`surname`,`mail`,`pass`,`phone`) VALUES ('$form_ad','$form_soyad','$form_mail','$form_sifre_hash','$form_tel')");
    //alınan bilgiler veritabanına eklenir.

    if (mysqli_errno($db) != 0) {
        exit();
    }
    header("Location: author_login.php");
} else {
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authorized Sign Up</title>
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
                        <h3 class="title has-text-black">Sign Up</h3>
                        <hr class="login-hr">
                        <p class="subtitle has-text-black">Please sign up to proceed.</p>
                        <div class="box">
                            <form action="author_signup.php" method="post">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="text" placeholder="Name" name="ad">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="text" placeholder="Surname" name="soyad">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="email" placeholder="Your Email" name="mail">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="text" placeholder="Phone Number" name="tel">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="password" placeholder="Your Password" name="sifre">
                                    </div>
                                </div>
                                <button class="button is-block is-info is-large is-fullwidth">Sign Up <i class="fa fa-sign-in" aria-hidden="true"></i></button>
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