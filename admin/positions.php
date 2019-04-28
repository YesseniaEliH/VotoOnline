<?php
	session_start();
	require('../connection.php');
	//If your session isn't valid, it returns you to the login screen for protection
	if( empty($_SESSION['admin_id']) ){
	   header("location:access-denied.php");
	}
	//retrive positions from the tbpositions table
	$result = $conn->query("SELECT * FROM tbpositions")
	or die("There are no records to display ... \n" . mysqli_error());
	if (mysqli_num_rows($result)<1){
	    $result = null;
	}
	?>
	<?php
	// inserting sql query
	if (isset($_POST['Submit']))
	{

	$newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

	$sql = $conn->query( "INSERT INTO tbPositions(position_name) VALUES ('$newPosition')" )
	        or die("Could not insert position at the moment". mysqli_error() );

	// redirect back to positions
	   header("Location: positions.php");
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
	 $result = $conn->query("DELETE FROM tbpositions WHERE position_id='$id'")
	 or die("The position does not exist ... \n");

	 // redirect back to positions
	 header("Location: positions.php");
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
        <li><i class="fa fa-envelope-o"></i> yesel1601hotmail.com </li>
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
        <li class="active"><a href="positions.php">Inicio</a></li>
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
	<CAPTION><h3 style="color:white;">AGREGAR NUEVO PUESTO DE JUNTA DIRECTIVA</h3></CAPTION>
	<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
	<tr>
	    <td bgcolor="#ffa726">Nombre de Puesto</td>
	    <td bgcolor="#808080"><input type="text" name="position" /></td>
	    <td bgcolor="#76ff03"><input type="submit" name="Submit" value="Agregar" /></td>
	</tr>
	</table>

	<table border="0" width="420" align="center">
		<CAPTION><h3 style="color:white;">PUESTOS DISPONIBLES</h3></CAPTION>
		<tr>
			<th>ID</th>
			<th>Nombre de puesto</th>
			<th>Acción</th>
		</tr>

		<?php
			//loop through all table rows
			while ($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['position_id']."</td>";
			echo "<td>" . $row['position_name']."</td>";
			echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Eliminar Puesto</a></td>';
			echo "</tr>";
			}
			mysqli_free_result($result);
			mysqli_close($conn);
		?>

	</table>
	<hr>
</div>

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
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Yess</a></p>
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
