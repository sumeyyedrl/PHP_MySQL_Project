<?php
session_start();

require_once "mysql.php";


if(isset($_POST["ad"]) && isset($_POST["aciklama"])){ //form çıktısı alındı mı kontrol eder.
    $form_ad = $_POST["ad"];
    $form_aciklama = $_POST["aciklama"];

    mysqli_query($db, "INSERT INTO `organizations` (`name`,`about`) VALUES ('$form_ad','$form_aciklama')");
    //forma göre veritabanına ekleme yapılır.

    if (mysqli_errno($db) != 0) {
        echo "Hata";
        exit();
    }
    header("Location: author.php");
}

else {
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
                            <form action="add_org.php" method="post">
                            <div class="field">
                                <label class="label">Organization Name</label>
                                <div class="control">
                                    <input class="input is-medium" type="text" name="ad">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">About</label>
                                <div class="control">
                                    <textarea class="textarea is-medium" name="aciklama"></textarea>
                                </div>
                            </div>
                            <div class="control">
                                <button type="submit" class="button is-link is-fullwidth has-text-weight-medium is-medium">Add Organization</button>
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