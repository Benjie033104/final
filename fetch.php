<?php

include "connection.php";

$result = $conn->query("SELECT * FROM info");

$record = [];

while($row = $result->fetch_assoc()){
    $record[] = [
        "id" => $row["id"],
        "firstname" => $row["firstname"]
    ];
}

echo json_encode([
    "success" => true,
    "record" => $record
]);