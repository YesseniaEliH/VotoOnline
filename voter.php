<?php
	require('connection.php');

	session_start();
	//If your session isn't valid, it returns you to the login screen for protection
	if(empty($_SESSION['member_id'])){
	 	header("location:access-denied.php");
	}
?>


<!DOCTYPE html>

<html>
<head>
<title>VOTO ONLINE</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="css/user_styles.css" rel="stylesheet" type="text/css" /> -->
<script language="JavaScript" src="js/user.js">
</script>

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-pinterest" href="https://uk.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
        <li><a class="faicon-twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-rss" href="https://www.rss.com/"><i class="fa fa-rss"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
				<li><i class="fa fa-phone"></i> +975429272</li>
        <li><i class="fa fa-envelope-o"></i> yesel1601@hotmail.com </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.html">VOTO ONLINE</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Inicio</a></li>
        <li><a class="drop" href="#">Votación</a>
          <ul>
            <li><a href="vote.php">Votar</a></li>
            <li><a href="manage-profile.php">Mi perfil</a></li>
          </ul>
        </li>

        <li><a href="logout.php">Salir</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper bgded overlay" style="background-image:url('images/voto.jpeg');">
  <section id="testimonials" class="hoc container clear">
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Voto <a href="#">ONLINE</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote> <div id="container">
		<p> Vota o modifica tus datos</p>
		</div> </blockquote>

      </li>

    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear">
    <div class="one_third first">
      <h6 class="title">Dirección</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-suitcase"></i>
          <address>
          <p> Universidad Nacional Daniel Alcides Carrión  </p>
          </address>
        </li>
      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Curso</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-file"></i> Sistema de Soporte para la Toma de Desiciones</li>
      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Integrantes</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-child"></i> BARDALES ROJAS Nycol </li>
        <li><i class="fa fa-child"></i> CRISTOBAL ALCÁNTARA Kaly </li>
        <li><i class="fa fa-child"></i> DE LA CRUZ GILIAN Thalia </li>
        <li><i class="fa fa-child"></i> HUAMAN ATENCIO Yessenia</li>
        <li><i class="fa fa-child"></i> POMA AYALA Xiomi</li>
      </ul>
    </div>

  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear">
    <!-- ################################################################################################ -->
		<p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Yess</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>
