<?php
require 'connect.php';
session_start();

$id = [];
$hotelData = [];
$HotelName = [];
$HotelLocation = [];
$HotelImage = [];
$HotelAppartmentCategory = [];
$HotelRooms = [];
$HotelMessage = [];
$AccountCredentials =[];
$remiaingRooms= [];
$price=[];
//if (isset($postdata) && !empty($postdata))
{

    $sql = "SELECT * from hotel";


    if($result = mysqli_query($con,$sql))
    {
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            $HotelName[$i] = $row['HotelName'];
            $HotelLocation[$i] = $row['HotelLocation'];
            $HotelImage[$i] = $row['HotelImage'];
            $HotelAppartmentCategory[$i] = $row['HotelAppartmentCategory'];
            $HotelRooms[$i] = $row['HotelRooms'];
            $HotelMessage[$i] = $row['HotelMessage'];
            $remiaingRooms[$i] = $row['remiaingRooms'];
            $price[$i] = $row['price'];

            $AccountCredentials[$i] = [
                'id' => $row['HotelId'],
                'HotelName' => $HotelName[$i],
                'HotelLocation' => $HotelLocation[$i],
                'HotelImage' => $HotelImage[$i],
                'HotelAppartmentCategory' => $HotelAppartmentCategory[$i],
                'HotelRooms' => $HotelRooms[$i],
                'HotelMessage' => $HotelMessage[$i],
                'remiaingRooms' => $remiaingRooms[$i],
                'price' => $price[$i]
            ];

            $i++;
        }
        http_response_code(201);
        echo json_encode($AccountCredentials);
    }
    else
    {
        http_response_code(422);
    }
}