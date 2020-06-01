<?php
require 'connect.php';
session_start();

$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata))

{
    $request = json_decode($postdata);

    // Validate.
    if(trim($request->type) === '' || trim($request->rangeOfPeople) === '')
    {
        return http_response_code(400);
    }

    //Sanitize
    $username = mysqli_real_escape_string($con, trim($request->username));
    $type = mysqli_real_escape_string($con, trim($request->type));
    $from = mysqli_real_escape_string($con, trim($request->from));
    $to = mysqli_real_escape_string($con, trim($request->to));
    $rangeOfPeople = mysqli_real_escape_string($con, trim($request->rangeOfPeople));

    $sql = "INSERT INTO `bookingdetails`(`id`,`username`,`hotelType`,`start_date`,
`end_date`,`rangeOfPeople`) VALUES (null,'{$username}','{$type}','{$from}','{$to}'
,'{$rangeOfPeople}')";


    if($result = mysqli_query($con,$sql))
    {
        http_response_code(201);
        $AccountCredentials = [
            'UserName' => $username,
            'TypeofHotel' => $type,
            'MemberId'    => mysqli_insert_id($con)
        ];
        echo json_encode($AccountCredentials);
    }
    else
    {
        http_response_code(422);
    }
}