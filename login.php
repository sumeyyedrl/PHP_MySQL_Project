<?php
session_start();

require_once "mysql.php";

if (isset($_POST["mail"]) && isset($_POST["sifre"])) { //form çıktısı alındı mı kontrol eder.
    $form_mail = $_POST["mail"];
    $form_sifre = $_POST["sifre"];

    $form_sifre_hash = hash("sha256", $form_sifre);

    $q = mysqli_query($db, "SELECT * FROM user WHERE `mail` = '$form_mail' AND `pass`='$form_sifre_hash'");
    //bilgiler veritabanındaki kullanıcılarla eşleşiyor mu kontrol eder.
    $num = mysqli_num_rows($q);
    if ($num == 0) {
        echo "Yanlış giriş yaptınız!"; //eşleşen yoksa uyarı verir ve kodu durdurur.
        exit();
    } else if ($num == 1) {
        $user = mysqli_fetch_assoc($q);
        $_SESSION['ID'] = $user["user_id"]; //eşleşen varsa oturum başlar
        header("Location: user.php");
    }
} else {
?>

<html>
    <head>
        <title>Log In</title>
    </head>
    <body cz-shortcut-listen="true">
        <section class="container">
            <div class="columns is-multiline">
                <div class="column is-8 is-offset-2 register">
                    <div class="columns">
                        <div class="column left">
                            <h1 class="title is-1">Donation Website</h1>
                            <h2 class="subtitle colored is-4">Log in and start donating!</h2>
                            <p>Once you sign up, you can see all of your previous donations and add many to them pretty easily. Just log in and start donating.</p>
                        </div>
                        <div class="column right has-text-centered">
                            <h1 class="title is-4">Log in today</h1>
                            <p class="description">If you don't have an account <a href="signup.php">sign up</a> first.</p>
                            <form action="login.php" method="post">

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-medium" type="email" placeholder="Email" name="mail">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-medium" type="password" placeholder="Password" name="sifre">
                                    </div>
                                </div>

                                <button type="submit" class="button is-block is-primary is-fullwidth is-medium">Log In</button>
                                <br>
                                <small><em>Let's Start!</em></small>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="column is-8 is-offset-2">
                    <br>
                    <nav class="level">
                        <div class="level-right">
                            <small class="level-item" style="color: var(--textLight)">
                                © Super Cool Website. All Rights Reserved.
                            </small>
                        </div>
                    </nav>
                </div>
            </div>
        </section>
    </body>
</html>


<?php
}
?>