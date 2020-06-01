<?php
require 'connect.php';
session_start();

$postdata = file_get_contents("php://input");
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
if (isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);

    // Validate.
    if(trim($request->type) === '' || trim($request->rangeOfPeople) === '')
    {
        return http_response_code(400);
    }

    //Sanitize
    $type = mysqli_real_escape_string($con, trim($request->type));
    $from = mysqli_real_escape_string($con, trim($request->from));
    $to = mysqli_real_escape_string($con, trim($request->to));
    $rangeOfPeople = mysqli_real_escape_string($con, trim($request->rangeOfPeople));

    $sql = "SELECT * from hotel where HotelAppartmentCategory='".$type."'";


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