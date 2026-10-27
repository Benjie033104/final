<?php

$conn = new mysqli("localhost", "root", "", "database_javascript");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}