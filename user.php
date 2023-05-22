<?php
session_start();

require_once "mysql.php";

if (!isset($_SESSION["ID"])) {
    echo "giris yap";
    exit();
}

$form_id = $_SESSION["ID"];

$donation_info = mysqli_query($db, "SELECT * FROM donate");
$org_info1 = mysqli_query($db, "SELECT * FROM organizations");
$org_info2 = mysqli_query($db, "SELECT * FROM organizations");
$org_info3 = mysqli_query($db, "SELECT * FROM organizations");



if (
    isset($_POST["miktar"]) && isset($_POST["ad-soyad"]) && isset($_POST["no"]) &&
    isset($_POST["ay"]) && isset($_POST["yıl"]) && isset($_POST["cvc"]) && isset($_POST["kurum"])
) { //form çıktısı alındı mı kontrol eder.

    $form_miktar = $_POST["miktar"];
    $form_kurum = $_POST["kurum"];
    $dt = date('Y-m-d');

    mysqli_query($db, "INSERT INTO `donate` (`user_id`,`amount`,`org_id`,`date`) VALUES ('$form_id','$form_miktar','$form_kurum','$dt')");
    //ilgili bilgiler veritabanına eklenir.

    if (mysqli_errno($db) != 0) {
        echo "Bir sorun oluştu";
        exit();
    }
    header("Location: payment.php");
} else {
?>

    <html>

    <head>
        <meta charset="UTF-8">
        <title>Donation Website</title>
        <link rel="stylesheet" href="css/tabs.css">
        <script src="https://kit.fontawesome.com/7dc3015a44.js" crossorigin="anonymous"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/neumorphic-login.css">
        <link rel="stylesheet" href="css/bulma.min.css">
        <link rel="stylesheet" href="css/main.min.css">
    </head>

    <body cz-shortcut-listen="true">

        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">Welcome</h1>
                    <h2 class="subtitle">Check out the organizations and start donating!</h2>
                </div>
            </div>
            <div class="tabs is-boxed is-centered main-menu" id="nav">
                <ul>
                    <li data-target="pane-1" id="1" class="is-active">
                        <a>
                            <span class="icon is-small"></span>
                            <span>Organizations</span>
                            <span class="icon is-small"></span>
                        </a>
                    </li>
                    <li data-target="pane-2" id="2">
                        <a>
                            <span class="icon is-small"></span>
                            <span>Donate</span>
                            <span class="icon is-small"></span>
                        </a>
                    </li>
                    <li data-target="pane-3" id="3">
                        <a>
                            <span class="icon is-small"></span>
                            <span>Previous Donations</span>
                            <span class="icon is-small"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane is-active" id="pane-1">
                    <div class="columns">
                        <div class="container">
                            <div class="columns">
                                <div class="column">
                                    <div class="content">
                                        <?php
                                        while ($answer1 = mysqli_fetch_assoc($org_info1)) {
                                            echo "<p><strong>" . $answer1["name"] . "</strong><br>" . $answer1['about'] . "</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pane-2">
                    <div class="content">
                        <section>
                            <div class="hero-body has-text-centered">
                                <div class="login">
                                    <form action="payment.php" method="post">
                                        <div class="columns is-4">
                                            <div class="field">
                                                <div class="control column is-one-twos">
                                                    <label class="label has-text-left">Amount</label>
                                                    <input class="input" type="text" placeholder="Amount" name="miktar">
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="control column is-one-twos">
                                                    <label class="label has-text-left">Organization</label>
                                                    <select name="kurum" class="select">
                                                        <option value="">Select Organization</option>
                                                        <?php
                                                        while ($answer2 = mysqli_fetch_assoc($org_info2)) { ?>
                                                            <option value=<?= $answer2["org_id"] ?>> <?= $answer2["name"] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="control">
                                                <label class="label has-text-left">Name-Surname</label>
                                                <input class="input" type="text" name="ad-soyad">
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="control">
                                                <label class="label has-text-left">Card Number</label>
                                                <input class="input" type="text" name="no">
                                            </div>
                                        </div>

                                        <div class="columns is-6">
                                            <div class="field">
                                                <div class="control column is-one-thirds">
                                                    <label class="label has-text-left">Month</label>
                                                    <input class="input" type="text" name="ay">
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="control column is-one-thirds">
                                                    <label class="label has-text-left">Year</label>
                                                    <input class="input" type="text" name="yıl">
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="control column is-one-thirds">
                                                    <label class="label has-text-left">CVC</label>
                                                    <input class="input" type="text" name="cvc">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="button is-block is-primary is-medium">Pay with Card</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="tab-pane" id="pane-3">
                    <section class="section">
                        <div class="container">
                            <div class="b-table">
                                <div class="table-wrapper has-mobile-cards">
                                    <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Amount</th>
                                                <th>Organization</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT donate.*, organizations.name AS org_name, user.name AS user_name , user.surname AS user_surname
                                            FROM donate
                                            INNER JOIN organizations ON donate.org_id = organizations.org_id
                                            INNER JOIN user ON donate.user_id = user.user_id
                                            WHERE donate.user_id = $form_id";
                                            $info = mysqli_query($db, $sql);
                                            while ($answer3 = mysqli_fetch_assoc($info)) {
                                                echo "<tr>";
                                                echo "<td>" . $answer3["user_name"] . "</td>";
                                                echo "<td>" . $answer3["user_surname"] . "</td>";
                                                echo "<td>" . $answer3["amount"] . "</td>";
                                                echo "<td>" . $answer3["org_name"] . "</td>";
                                                echo "<td>" . $answer3["date"] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <script src="js/tabs.js"></script>
    </body>

    </html>



<?php
}
?>