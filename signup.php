<?php

require_once "mysql.php";

if (isset($_POST["ad"]) && isset($_POST["soyad"]) && isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["sifre"])) { //form çıktısı alındı mı kontrol eder.
  $form_ad = $_POST["ad"];
  $form_soyad = $_POST["soyad"];
  $form_sifre = $_POST["sifre"];
  $form_mail = $_POST["mail"];
  $form_tel = $_POST["tel"];

  $form_sifre_hash = hash("sha256", $form_sifre);

  mysqli_query($db, "INSERT INTO `user` (`name`,`surname`,`mail`,`pass`,`phone`) VALUES ('$form_ad','$form_soyad','$form_mail','$form_sifre_hash','$form_tel')");
  //forma göre veritabanına ekleme yapılır.

  if (mysqli_errno($db) != 0) {
    exit();
  }
  header("Location: login.php");
} else {
?>
<html>
  <head>
    <title>Sign Up</title>
  </head>
  <body cz-shortcut-listen="true">
    <section class="container">
      <div class="columns is-multiline">
        <div class="column is-8 is-offset-2 register">
          <div class="columns">
            <div class="column left">
              <h1 class="title is-1">Donation Website</h1>
              <h2 class="subtitle colored is-4">Sign up and start donating!</h2>
              <p>Once you sign up, you can see all of your previous donations and add many to them pretty easily.</p>
            </div>
            <div class="column right has-text-centered">
              <form action="signup.php" method="post">

                <div class="field">
                  <div class="control">
                    <input class="input" type="text" placeholder="Name" name="ad">
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input" type="text" placeholder="Surname" name="soyad">
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input" type="email" placeholder="E-Mail" name="mail">
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input" type="text" placeholder="Phone Number" name="tel">
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input" type="password" placeholder="Password" name="sifre">
                  </div>
                </div>
                <button type="submit" class="button is-block is-primary is-fullwidth is-medium">Sign Up</button>
              </form>
            </div>
          </div>
        </div>
        <div class="column is-8 is-offset-2">
          <br>
          <nav class="level">
            <div class="level-right">
              <small class="level-item" style="color: var(--textLight)">
                <!-- © Super Cool Website. All Rights Reserved. -->
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