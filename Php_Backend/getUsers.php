<?php
require 'connect.php';
session_start();

$id = [];
$name = [];
$email = [];
$password = [];

$sql = "SELECT * from account";


if ($result = mysqli_query($con, $sql)) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id[$i] = $row['id'];
        $name[$i] = $row['name'];
        $email[$i] = $row['email'];
        $password[$i] = $row['password'];

        $AccountCredentials[$i] = [
            'id' => $id[$i],
            'name' => $name[$i],
            'email' => $email[$i],
            'password' => $password[$i]
        ];
        $i++;
    }
    http_response_code(201);
    echo json_encode($AccountCredentials);
} else {
    http_response_code(422);
}
