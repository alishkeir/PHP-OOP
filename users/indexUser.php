<?php

require_once '../vendor/autoload.php';

use App\Models\User;

$model = new User();
$users = $model->index()->fetchAll(PDO::FETCH_OBJ);

$data = [
    'status' => 200,
    'users' => $users
];
header('Content-Type: application/json');
echo json_encode($data);
