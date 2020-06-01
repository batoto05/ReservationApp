<?php
require 'connect.php';


$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);
    // Validate.
    if(trim($request->id) === '')
    {
        return http_response_code(400);
    }
    //Sanitize
    $id = mysqli_real_escape_string($con, (int)$request->id);
    $table = mysqli_real_escape_string($con, trim($request->table));

    if($table == 'HotelsInfo')
    {
        $sql = " DELETE from `hotel` where HotelId = '".$id."'";
        if($result = mysqli_query($con,$sql)) {
            $AccountCredentials = [
                'id' => $id,
                'table' => 'HotelsInfo'
            ];
            http_response_code(201);
            echo json_encode($AccountCredentials);
        }
        else
        {
            http_response_code(422);
        }
    }
    elseif ($table == 'BookingInfo')
    {
        $sql = " DELETE from `bookingdetails` where id = '".$id."'";
        if($result = mysqli_query($con,$sql)) {
            $AccountCredentials = [
                'id' => $id,
                'table' => 'BookingInfo'
            ];
            http_response_code(201);
            echo json_encode($AccountCredentials);
        }
        else
        {
            http_response_code(422);
        }
    }
    elseif ($table == 'AccountsInfo')
    {
        $sql = " DELETE from `account` where id = '".$id."'";
        if($result = mysqli_query($con,$sql)) {
            $AccountCredentials = [
                'id' => $id,
                'table' => 'AccountsInfo'
            ];
            http_response_code(201);
            echo json_encode($AccountCredentials);
        }
        else
        {
            http_response_code(422);
        }
    }


}