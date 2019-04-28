<?php
  require_once('connection.php');

  session_start();

  if(empty($_SESSION['member_id'])){
    header("location:access-denied.php");
  }
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Votación</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

    <script language="JavaScript" src="js/admin.js">
    </script>

</head>
<body>
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

          <li><a href="index.php">Salir</a></li>

        </ul>
      </nav>

    </header>
  </div>
  <form role="form" method="POST" action="vote_up.php">
    <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default" style="background-color:#d1c4e9; padding: 10px">
            <div class="panel-heading" style="background-color:#1b5e20; color:#fff; padding: 10px 10px">
              <center>
                <CAPTION><h3>ELECCIÓN DE JUNTA DIRECTIVA</h3><p>
                  Escoja una opción por cada puesto
                </p></CAPTION>
              </center>
            </div>
        <?php

            // $positions= $conn->query("SELECT * FROM tbPositions")
            // or die("There are no records to display ... \n" . mysqli_error());
          ?>
          <table border="0" width="620" align="center" style="margin-top:30px; margin-bottom:20px">

            <tr>
            <strong>
            <th>ID</th>
            <th>Nombre de Candidato</th>
            <th>Puesto</th>
            <th>Acción</th>
            </strong>
            </tr>
          <?php
            $result = $conn->query("SELECT * FROM tbcandidates");
            while ($row= mysqli_fetch_array($result)){
            echo "<tr>";
            // echo '<input name="id_candidato" type="hidden" class="form-control" value="'. $row['candidate_id'] .'">';
            echo "<td>" . $row['candidate_id']."</td>";
            echo "<td>" . $row['candidate_name']."</td>";
            echo "<td>" . $row['candidate_position']."</td>";
            ?>
            <div class="radio">
            <?php
            echo "<td><label> <input type='radio' name='". $row['candidate_position']."'value='" . $row['candidate_name'] . "'/></label></td>";
            ?>
          </div>
            <?php
            echo "</tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success">Enviar voto</button>
    </center>
  </form>
</body>
</html>
