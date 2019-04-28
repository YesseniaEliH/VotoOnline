<?php
    session_start();
    require('../connection.php');
    if(empty($_SESSION['admin_id'])){
      header("location:access-denied.php");
    }
    $result= $conn->query("SELECT * FROM tbmembers")
    or die("No hay registros que mostrar ... \n" . mysqli_error());
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>

<?php
if (isset($_POST['Submit']))
{

    $newUserNames = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
    $newUserLastname = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
    $newUserEmail = $_POST['email']; //prevents types of SQL injection
    $newUserVoterId =  $_POST['voter_id']; //prevents types of SQL injection
    $newUserPassword = $_POST['password']; //prevents types of SQL injection
    $newpass = md5($newUserPassword);

    $sql = $conn->query( "INSERT INTO tbmembers(first_name,last_name,email,voter_id,password)
    VALUES ('$newUserNames','$newUserLastname','$newUserEmail','$newUserVoterId','$newpass')" )
            or die("No se puede insertar a este votante". mysqli_error() );

    // redirect back to candidates
     header("Location: users.php");
    }
?>

<?php
    // deleting sql query
    // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
     // get id value
     $id = $_GET['id'];

     // delete the entry
     $result =  $conn->query("DELETE FROM tbmembers WHERE member_id='$id'")
     or die("The candidate does not exist ... \n");

     // redirect back to candidates
     header("Location: users.php");
     }
     else
     // do nothing
?>






<!DOCTYPE html>

<html>
<head>
<title>VOTO ONLINE</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

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
        <li><a class="drop" href="#">Panel Administrador</a>
          <ul>
            <li><a href="users.php">Votantes</a></li>
            <li><a href="positions.php">Puestos Junta Directiva </a></li>
            <li><a href="candidates.php">Candidatos</a></li>
            <li><a href="refresh_actual.php">Resultados</a></li>
          </ul>
        </li>
        <!-- <li><a href="../index.php">Panel de Votación</a></li> -->
        <li><a href="logout.php">Salir</a></li>

      </ul>
    </nav>

  </header>
</div>

<div >
<table width="380" align="center">
<CAPTION><h3 style="color:white;">AGREGAR NUEVO VOTANTE</h3></CAPTION>
<form name="fmUsers" id="fmUsers" action="users.php" method="post" onsubmit="return userValidate(this)">
<tr>
    <td bgcolor="#FAEBD7">Nombres</td>
    <td bgcolor="#FAEBD7"><input type="text" name="firstname" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Apellidos</td>
    <td bgcolor="#FAEBD7"><input type="text" name="lastname" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Email</td>
    <td bgcolor="#FAEBD7"><input type="email" name="email" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Id Votante</td>
    <td bgcolor="#FAEBD7"><input type="text" name="voter_id" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Password</td>
    <td bgcolor="#FAEBD7"><input type="text" name="password" /></td>
</tr>
<tr>
    <td bgcolor="#BDB76B">&nbsp;</td>
    <td bgcolor="#BDB76B"><input type="submit" name="Submit" value="Agregar" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3 style="color:white;">VOTANTES</h3></CAPTION>
<tr>
<th>ID</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Email</th>
</tr>

<?php
    //loop through all table rows
    while ($row= mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['member_id']."</td>";
      echo "<td>" . $row['first_name']."</td>";
      echo "<td>" . $row['last_name']."</td>";
      echo "<td>" . $row['email']."</td>";
      echo '<td><a href="users.php?id=' . $row['member_id'] . '">Eliminar Votante</a></td>';
      echo "</tr>";
    }
    mysqli_free_result($result);
    mysqli_close($conn  );
?>

</table>
<hr>
</div>



<div class="wrapper row4">
  <footer id="footer" class="hoc clear">

    <div class="one_third first">
      <h6 class="title">Dirección</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          <p>
            Universidad Nacional Daniel Alcides Carrión
          </p>
          </address>
        </li>
      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Curso</h6>
      <ul class="nospace linklist contact">

        <li><i class="fa fa-phone"></i> Sistema de Soporte para la Toma de Desiciones</li>

      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Integrantes</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-envelope-o"></i> BARDALES ROJAS Nycol <br>
                                             CRISTOBAL ALCÁNTARA Kaly <br>
                                             DE LA CRUZ GILIAN Thalia <br>
                                             HUAMAN ATENCIO Yessenia <br>
                                             POMA AYALA Xiomi</li>
      </ul>
    </div>

  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear">

    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Md. Rezwanul Haque</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>

  </div>
</div>

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
