<?php
      // session_start();
      // $myusername = $_SESSION['nam'] ;
      // $mypassword = $_SESSION['pas'] ;

    session_start();
    $myusername = isset($_SESSION['nam'])?$_SESSION['nam']:"" ;
    $mypassword = isset($_SESSION['pas'])?$_SESSION['pas']:"" ;
?>
<?php
      if(isset($_COOKIE['$email']) && $_COOKIE['$pass']){
          header("Location:admin.php");
          exit;
      }
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Administrador Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">
      <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
      <script language="JavaScript" src="js/admin.js">
      </script>

</head>

<body id="top">
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear">
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
    </div>
  </div>
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left">
        <h1><a href="index.html">VOTO ONLINE</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="../index.php">Inicio</a></li>
          <li><a class="drop" href="#">Páginas</a>
            <ul>
              <li><a href="admin/index.php">Administrador</a></li>
              <li><a href="../login.php">Votante</a></li>

            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>
<div class="wrapper bgded overlay widthYess" style="background-image:url('../images/voto.jpeg');">
  <div class="container" >
    <div class=""></div>
    <div class="card">
      <center> <h1 class="title">Login Administrador</h1></center>
      <form name="form1" action="checklogin.php" method="post" onsubmit="return loginValidate(this)">
        <div class="input-container">
          <input name="myusername" value="<?php echo $myusername  ?>" type="text" required="required"/>
          <label>Email</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input name="mypassword" value="<?php echo $mypassword ?>" type="password"  required="required"/>
          <label>Password</label>
          <div class="bar"></div>
        </div>

      <center><input type="checkbox" name="remember" value="1"> <font color="blue">Recordarme</font></center><br>

      <div class="button-container">

        <button name="Submit"><span>Login</span></button>

      </div>

    </form>
  </div>

  </div>
</div>

</body>
</html>
