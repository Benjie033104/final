<?php

include "connection.php";

$id = $_POST["editId"];
$firstName = $_POST["firstname"];
$middleName = $_POST["middlename"];
$lastName = $_POST["lastname"];
$email = $_POST["email"];
$age = $_POST["age"];
$birthDate = $_POST["birth_date"];

$stmt = $conn->prepare("UPDATE info SET firstname = ?, middlename = ?, lastname = ?, email = ?, age = ?, birth_date = ? WHERE id = ?");
$stmt->bind_param("ssssisi", $firstName, $middleName, $lastName, $email, $age, $birthDate, $id);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
    ]);
} else {
    echo json_encode([
        "success" => false
    ]);
}