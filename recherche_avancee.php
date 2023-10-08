<?php
// Inclure la configuration de la base de données
include("config.php");

$gender = $_POST['gender'] ?? '';
$race = $_POST['race'] ?? '';
$height = $_POST['height'] ?? '';
$weight = $_POST['weight'] ?? '';
$last_location = $_POST['last_location'] ?? '';

$sql = "SELECT * FROM posted WHERE 1=1 ";

if(!empty($gender)){
    $sql .= "AND gender = '$gender' ";
}

if(!empty($race)){
    $sql .= "AND race = '$race' ";
}

if(!empty($height)){
    $sql .= "AND height = '$height' ";
}

if(!empty($weight)){
    $sql .= "AND weight = '$weight' ";
}

if(!empty($last_location)){
    $sql .= "AND last_location = '$last_location' ";
}

$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["post_Id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>
