<?php session_start(); ?>
<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Nawigacja</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar-brand-custom" href="index.php">jScore - Baza informacji piłkarskich</a>
    </div>
     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
             <?php
            if(isset($_SESSION['isLogin'])){
              echo "<li><a href='admin.php'>Panel admina</a></li>";
              echo "<li class='active'><a href='logout.php'>Wyloguj <b>[ ".$_SESSION["userLogin"]." ]</b>"."</a></li>";
            } else echo '<li class="active"><a href="logowanie.php"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Logowanie</a></li>';
          ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>

<div class="container-fluid">
    <div class="row">
        <img src="img/header.jpg" class="img-responsive"/>
    </div>
</div>
</header>