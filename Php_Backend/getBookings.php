<?php
require 'connect.php';
session_start();

$id = [];
$username = [];
$hotelType = [];
$start_date = [];
$end_date = [];
$rangeOfPeople = [];

$sql = "SELECT * from bookingdetails";


if ($result = mysqli_query($con, $sql)) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id[$i] = $row['id'];
        $username[$i] = $row['username'];
        $hotelType[$i] = $row['hotelType'];
        $start_date[$i] = $row['start_date'];
        $end_date[$i] = $row['end_date'];
        $rangeOfPeople[$i] = $row['rangeOfPeople'];

        $AccountCredentials[$i] = [
            'id' => $id[$i],
            'username' => $username[$i],
            'hotelType' => $hotelType[$i],
            'start_date' => $start_date[$i],
            'end_date' => $end_date[$i],
            'rangeOfPeople' => $rangeOfPeople[$i]
        ];
        $i++;
    }
    http_response_code(201);
    echo json_encode($AccountCredentials);
} else {
    http_response_code(422);
}
