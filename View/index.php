<!DOCTYPE html>
<html>
  <head>
    <title> Fondation Library </title>
      <link href='gambar/aa.png' rel='shortcut icon'>
      <link href="action.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
  </head>
  <body>
    <img src="gambar/dd.png" class="logopic">
    <div class="legal">
      <h3> #Fondation Library <h3>
    </div>
    <nav>
    <div class="profile">
      <ul class="menu">
        <li><a href="index.php" title="Home"><button style="background:#00c198;border-radius:10px;color:#000;font-size:25px">Home</button></a></li>
        <li><a href="add_collegestudent.php"><button style="background:#00c198;border-radius:10px;border-radius:10px;color:#000;font-size:25px">Daftar</button></a></li>
        <li><a href="#"><button style="background:#00c198;border-radius:10px;color:#000;font-size:25px">Contact</button></a></li>
      </ul>
    </nav>
    <header></header>
    <section>
      <article class="center">
        <?php
          require 'data_collegestudent.php';
        ?>
      </article>
    </section>

   <!--  <footer>~ By : Fondation Library ~</footer> -->
  </body>
</html>
