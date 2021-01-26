<?php

require_once '../vendor/autoload.php';

use App\Models\User;

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$model = new User();
$model->store($email, $username, $password, $name);

$data = [
    'status' => 200,
    'message' => "Successfully Stored"
];
header('Content-Type: application/json');
echo json_encode($data);
