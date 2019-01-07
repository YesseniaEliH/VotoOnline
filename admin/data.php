<?php
$pos = $_GET['position'];

header('Content-Type: application/json');

$con = mysqli_connect("127.0.0.1","root","","voto_online");
// Check connection

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();

    $result = mysqli_query($con, "SELECT * FROM tbcandidates WHERE candidate_position = '$pos'");

    while($row = mysqli_fetch_array($result))
    {
        $point = array("label" => $row['candidate_name'] , "y" => $row['candidate_cvotes']);

        array_push($data_points, $point);
    }

    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>
