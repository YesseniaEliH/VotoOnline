<?php
require_once('../connection.php');
$position='';
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){

  $position = addslashes( $_POST['position'] );

}
    else
        // do nothing
?>
<?php
// retrieving positions sql query
$positions= $conn->query("SELECT * FROM tbpositions")
or die("There are no records to display ... \n" . mysqli_error());
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>


<!DOCTYPE html>

<html>
<head>
<title>VOTO ONLINE</title>


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

  <div >
    <table width="420" align="center">
    <form name="fmNames" id="fmNames" method="post" action="refresh_actual.php" onSubmit="return positionValidate(this)">
    <tr>
        <td style="color:#000000";>Escoger Puesto</td>
        <td><SELECT NAME="position" id="position">
        <OPTION  VALUE="select"><p style="color:black";>Seleccionar</p>
        <?php
        //loop through all table rows
        while ($row= mysqli_fetch_array($positions)){
          echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
        }
        ?>
        </SELECT></td>
        <td style="color:black";><input type="submit" name="Submit" value="Ver Resultados" /></td>
    </tr>
    <tr>


    </tr>
    </form>
    </table>
    <script src="js/jquery-1.2.6.min.js"></script>
    <!-- <script src="canvasjs.js"></script> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $.getJSON("data.php",{position:'<?php echo $position; ?>'}, function (result) {

                var chart = new CanvasJS.Chart("chartContainer", {
                  animationEnabled: true,
                  backgroundColor: 'transparent',
                	title:{
                		text: "Resultados: <?php echo $position; ?>",
                    fontColor: "white",
                	},
                    data: [
                        {
                            type: "pie",
                            legendText: "{label}",
                        		indexLabelFontSize: 16,
                        		indexLabel: "{label} - #percent%",
                        		yValueFormatString: "Votos:#,##0",
                            indexLabelFontColor: "white",
                            dataPoints: result
                        }
                    ]
                });

                chart.render();
            });
        });
    </script>

  </div>
<div id="chartContainer" style="width: 800px; height: 380px;"></div>
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
