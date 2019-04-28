<?php
session_start();
require('connection.php');

    while ($post = each($_POST))
    {
      $result = $conn->query("SELECT * FROM tbcandidates WHERE candidate_name = '$post[1]'")
      or die("There are no records to display ... \n" . mysqli_error());
      while ($row= mysqli_fetch_array($result)){
        $voto = $row['candidate_cvotes']+1;
        $id = $row['candidate_id'];
        $sql = "UPDATE tbcandidates SET `candidate_cvotes`= $voto WHERE candidate_id = $id";
        if ($conn->query($sql) === TRUE) {
           echo "<center><div><h2 style='color:#1b5e20;'>Se registró su voto para ". $post[0] ." </h2></div></center>";
            }
        }
    // echo $post[0] . " = " . $post[1];
    }
    echo '<script>
          window.setTimeout(function() {
          window.location = "index.php";
        }, 3000);
          </script>';


?>
