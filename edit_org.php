<?php
session_start();

require_once "mysql.php";
require_once "edit.php";


if (isset($_POST["ad"]) && isset($_POST["aciklama"]) && isset($_COOKIE["id"])) { //form çıktısı alındı mı kontrol eder.

    $form_ad = $_POST["ad"];
    $form_aciklama = $_POST["aciklama"];
    $form_id=$_COOKIE["id"]; //id bilgisi paylaşılır.

    $sql = "UPDATE organizations SET `name`='$form_ad',`about`='$form_aciklama' WHERE `org_id`='$form_id'";
    //paylaşılan id bilgisine ve forma göre güncelleme yapılır.
    mysqli_query($db, $sql);

    if (mysqli_errno($db) != 0) {
        echo "Hata";
        exit();
    }

    setcookie("id",$form_id,time()-60);

    header("Location: author.php");
    exit();
} else {
?>

    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Organizations</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/contact.css">
    </head>

    <body>
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="columns is-8 is-variable ">
                        <div class="column is-one-thirds has-text-left"></div>

                        <div class="column is-one-thirds has-text-left">
                            <form action="edit_org.php" method="post">
                                <div class="field">
                                    <label class="label text-left">Organization Name</label>
                                    <div class="control">
                                        <input class="input is-medium" type="text" name="ad">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label text-left">About</label>
                                    <div class="control">
                                        <textarea class="textarea is-medium" name="aciklama"></textarea>
                                    </div>
                                </div>
                                <div class="control">
                                    <button type="submit" class="button is-link is-fullwidth has-text-weight-medium is-medium">Edit Organization</button>
                                </div>
                            </form>
                        </div>
                        <div class="column is-one-thirds has-text-left"></div>
                    </div>
                </div>
            </div>
        </section>

    </body>

    </html>

<?php
}
?>