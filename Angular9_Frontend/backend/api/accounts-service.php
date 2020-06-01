<?php
require 'connect.php';
session_start();
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
    // Extract the data.
    $request = json_decode($postdata);

    // Validate.
    if(trim($request->MemberName) === '' || trim($request->MemberEmail) === '' || trim($request->MemberPassword) === '')
    {
        return http_response_code(400);
    }

    //Sanitize
    $name = mysqli_real_escape_string($con, trim($request->MemberName));
    $email = mysqli_real_escape_string($con, trim($request->MemberEmail));
    $password = mysqli_real_escape_string($con, trim($request->MemberPassword));

    //Create Account
    $sql = "INSERT INTO `account`(`id`,`name`,`email`,`password`) VALUES (null,'{$name}','{$email}','{$password}')";

    if(mysqli_query($con,$sql))
    {
        http_response_code(201);
        $AccountCredentials = [
            'MemberName' => $name,
            'MemberEmail' => $email,
            'MemberId'    => mysqli_insert_id($con)
        ];
        $_SESSION['user'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['id'] =  mysqli_insert_id($con);
        echo json_encode($AccountCredentials);
    }
    else
    {
        http_response_code(422);
    }
}
