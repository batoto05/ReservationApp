<?php
require 'connect.php';
session_start();
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);

    // Validate.
    if (trim($request->HotelName) === '' || trim($request->HotelLocation) === '' || trim($request->HotelImage) === '' ||
        trim($request->HotelAppartmentCategory)  === '' || (int)$request->HotelRooms < 0 || trim($request->HotelMessage)  === '') {
        return http_response_code(400);
    }

    //Sanitize
    $HotelName = mysqli_real_escape_string($con, trim($request->HotelName));
    $HotelLocation = mysqli_real_escape_string($con, trim($request->HotelLocation));
    $HotelImage = mysqli_real_escape_string($con, trim($request->HotelImage));
    $HotelAppartmentCategory = mysqli_real_escape_string($con, trim($request->HotelAppartmentCategory));
    $HotelRooms = mysqli_real_escape_string($con, (int)$request->HotelRooms);
    $HotelMessage = mysqli_real_escape_string($con, trim($request->HotelMessage));

    //Create Account
    $sql = "INSERT INTO `hotel`(`HotelId`,`HotelName`,`HotelLocation`,`HotelImage`,
`HotelAppartmentCategory`,`HotelRooms`,`HotelMessage`) VALUES (null,'{$HotelName}','{$HotelLocation}','{$HotelImage}','{$HotelAppartmentCategory}'
,'{$HotelRooms}','{$HotelMessage}')";

    if(mysqli_query($con,$sql))
    {
        http_response_code(201);
        $AccountCredentials = [
            'MemberName' => $HotelName,
            'MemberEmail' => $HotelLocation,
            'MemberId'    => mysqli_insert_id($con)
        ];
        echo json_encode($AccountCredentials);
    }
    else
    {
        http_response_code(422);
    }
}
