<?php
    session_start();
    require('../connection.php');
    if(empty($_SESSION['admin_id'])){
      header("location:access-denied.php");
    }
    $result= $conn->query("SELECT * FROM tbcandidates")
    or die("No hay registros que mostrar ... \n" . mysqli_error());
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>

<?php
    $positions_retrieved= $conn->query("SELECT * FROM tbpositions")
    or die("No hay registros que mostrar ... \n" . mysqli_error());
?>

<?php
if (isset($_POST['Submit']))
{

    $newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
    $newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection


    $sql = $conn->query( "INSERT INTO tbcandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" )
            or die("Could not insert candidate at the moment". mysqli_error() );

    // redirect back to candidates
     header("Location: candidates.php");
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
     $result =  $conn->query("DELETE FROMtbcandidates WHERE candidate_id='$id'")
     or die("The candidate does not exist ... \n");

     // redirect back to candidates
     header("Location: candidates.php");
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

<script language="JavaScript" src="js/user.js">
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
<CAPTION><h3 style="color:white;">AGREGAR NUEVO CANDIDATO</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td bgcolor="#FAEBD7">Nombre de Candidato</td>
    <td bgcolor="#FAEBD7"><input type="text" name="name" /></td>
</tr>

<tr>
    <td bgcolor="#7FFFD4">Puesto</td>

    <td bgcolor="#7FFFD4"><SELECT NAME="position" id="position">Seleccionar
    <OPTION VALUE="select">Seleccionar
    <?php
        //loop through all table rows
        while ($row= mysqli_fetch_array($positions_retrieved)){
          echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
        }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td bgcolor="#BDB76B">&nbsp;</td>
    <td bgcolor="#BDB76B"><input type="submit" name="Submit" value="Agregar" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3 style="color:white;">CANDIDATOS</h3></CAPTION>
<tr>
<th>ID</th>
<th>Nombre de Candidato</th>
<th>Puesto</th>
<th>Acción</th>
</tr>

<?php
    //loop through all table rows
    while ($row= mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['candidate_id']."</td>";
    echo "<td>" . $row['candidate_name']."</td>";
    echo "<td>" . $row['candidate_position']."</td>";
    echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Eliminar Candidato</a></td>';
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
