
<?php
include "connection.php";

$cityId = $_POST['cityId'];

$block = $conn->prepare("SELECT id, name FROM blocks WHERE citie_id = ?");
$block->bind_param("i", $cityId);
$block->execute();
$block->bind_result($id, $name);

echo "<option value=''>Select block</option>";
while ($block->fetch()) {
    echo "<option value='$id'>$name</option>";
}

$block->close();
$conn->close();



?>