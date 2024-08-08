<?php
include "connection.php";

$stateId = $_POST['stateId'];

$city = $conn->prepare("SELECT id, name FROM cities WHERE state_id = ?");
$city->bind_param("i", $stateId);
$city->execute();
$city->bind_result($id, $name);

echo "<option value=''>Select City</option>";
while ($city->fetch()) {
    echo "<option value='$id'>$name</option>";
}

$city->close();
$conn->close();


?>