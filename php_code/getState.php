<?php
include "connection.php";

$sql = "SELECT * FROM states";

$state = $conn->Prepare($sql);

 

$state->execute();

$state->bind_result($id, $name);

while ($state->fetch()) {
    echo "<option value='$id'>$name</option>";
}

$state->close();
$conn->close();



?>