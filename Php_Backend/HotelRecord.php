<?php
require 'connect.php';

$hotelData = [];


$sql = "SELECT HotelAppartmentCategory, 
COUNT(HotelId) AS `total` FROM hotel GROUP BY HotelAppartmentCategory ORDER BY total DESC
";
if($result = mysqli_query($con,$sql)) {
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
        $hotelData[$i]['HotelAppartmentCategory']    = $row['HotelAppartmentCategory'];
        $hotelData[$i]['total'] = $row['total'];
        $i++;
    }
    http_response_code(201);

    $AccountCredentials = [
        $hotelData[0]['HotelAppartmentCategory'] => $hotelData[0]['total'],
        $hotelData[1]['HotelAppartmentCategory'] => $hotelData[1]['total'],
        $hotelData[2]['HotelAppartmentCategory'] => $hotelData[2]['total']
    ];
    echo json_encode($AccountCredentials);
}