<?php
session_start();

require_once "mysql.php";

if (!isset($_SESSION["ID"])) { //session başlatılmadıysa giriş yapılmamış demektir. Kod durdurulur.
    header("author_login.php");
    exit();
}
$users_info = mysqli_query($db, "SELECT * FROM user");
$org_info = mysqli_query($db, "SELECT * FROM organizations");

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Authorized</title>
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
            </div>
        </div>
        <div class="tabs is-boxed is-centered main-menu" id="nav">
            <ul>
                <li data-target="pane-1" id="1" class="is-active">
                    <a>
                        <span class="icon is-small"></span>
                        <span>Users</span>
                        <span class="icon is-small"></span>
                    </a>
                </li>
                <li data-target="pane-2" id="2">
                    <a>
                        <span class="icon is-small"></span>
                        <span>Donations</span>
                        <span class="icon is-small"></span>
                    </a>
                </li>
                <li data-target="pane-3" id="3">
                    <a>
                        <span class="icon is-small"></span>
                        <span>Organizations</span>
                        <span class="icon is-small"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane is-active" id="pane-1">
                <section class="section">
                    <div class="container">
                        <div class="b-table">
                            <div class="table-wrapper has-mobile-cards">
                                <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>E-Mail</th>
                                            <th>Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($user_answer = mysqli_fetch_assoc($users_info)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_answer['name'] . "</td>";
                                            echo "<td>" . $user_answer['surname'] . "</td>";
                                            echo "<td>" . $user_answer['mail'] . "</td>";
                                            echo "<td>" . $user_answer['phone'] . "</td>";
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
            <div class="tab-pane" id="pane-2">
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
                                            <th>Organisation</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT donate.*, organizations.name AS org_name, user.name AS user_name , user.surname AS user_surname
                                        FROM donate
                                        INNER JOIN organizations ON donate.org_id = organizations.org_id
                                        INNER JOIN user ON donate.user_id = user.user_id";
                                        $donation_info = mysqli_query($db, $sql);
                                        while ($donation_answer = mysqli_fetch_assoc($donation_info)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $donation_answer['user_name'] . "</td>";
                                                    echo "<td>" . $donation_answer['user_surname'] . "</td>";
                                                    echo "<td>" . $donation_answer['amount'] . "</td>";
                                                    echo "<td>" . $donation_answer['org_name'] . "</td>";
                                                    echo "<td>" . $donation_answer['date'] . "</td>";
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
            <div class="tab-pane" id="pane-3">
                <section class="section">
                    <div class="container">
                        <div class="b-table">
                            <div class="table-wrapper has-mobile-cards">
                                <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>About</th>
                                            <th>Edit Organization</th>
                                            <th>Delete Organization</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($answer = mysqli_fetch_array($org_info)) {
                                            echo "<tr>";
                                            echo "<td>" . $answer['name'] . "</td>";
                                            echo "<td>" . $answer['about'] . "</td>";
                                            echo "<td><a href=edit_org.php?id=" . $answer["org_id"] . ">Edit</a></td>";
                                            echo "<td><a href=delete_org.php?id=" . $answer["org_id"] . ">Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <button onclick="window.open('add_org.php','_self');" class="button is-block is-primary is-medium">
                    Add Organization
                </button>
            </div>
        </div>
    </section>
    <script src="js/tabs.js"></script>
    <div class="column is-8 is-offset-2">
          <br>
          <nav class="level">
            <div class="level-right">
              <small class="level-item" style="color: var(--textLight)">
              Go to &nbsp;<a href="https://github.com/sumeyyedrl/PHP_MySQL_Project">Github</a>
              </small>
            </div>
          </nav>
        </div>
</body>

</html>
