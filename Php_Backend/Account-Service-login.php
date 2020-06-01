<?php
require 'connect.php';
session_start();

$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);

    // Validate.
    if(trim($request->MemberEmail) === '' || trim($request->MemberPassword) === '')
    {
        return http_response_code(400);
    }

    //Sanitize
    $email = mysqli_real_escape_string($con, trim($request->MemberEmail));
    $password = mysqli_real_escape_string($con, trim($request->MemberPassword));

    $sql = "SELECT * from account where email='".$email."' and password='".$password."'";

    if($result = mysqli_query($con,$sql))
    {
        $_SESSION['varname'] = "hafiy";
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = "hafiy";
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] =  $row['id'];
        http_response_code(201);
        $AccountCredentials = [
            'MemberName' => $row['name'],
            'MemberEmail' => $row['email'],
            'MemberId'    =>$row['id']
        ];
        echo json_encode($AccountCredentials);
    }
    else
    {
        http_response_code(422);
    }
}