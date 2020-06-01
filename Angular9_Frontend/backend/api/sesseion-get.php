<?php
require 'connect.php';
session_start();

echo $_SESSION['email'];
if(isset($_SESSION['id']) || !empty($_SESSION['id']))
{
    http_response_code(201);
    $AccountCredentials = [
        'MemberName' => $_SESSION['user'],
        'MemberEmail' => $_SESSION['email'],
        'MemberId'    =>$_SESSION['id']
    ];
    echo json_encode($AccountCredentials);
}
else
{
    http_response_code(422);
}