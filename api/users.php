<?php
require_once '../require.php';

if (isset($_GET) && !isset($_GET['id']) && !isset($_GET['delete']) && !isset($_POST))
{
    echo readUsers($connect);
}

if (isset($_POST['full_name']) && !isset($_POST['id']))
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $hash = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $data = [
        'full_name' => trim($_POST['full_name']),
        'email'     => trim($_POST['email']),
        'password'  => $hash
    ];

    echo createUser($connect, $data);
}

if (isset($_POST['id']))
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $hash = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $data = [
        'id'        => trim($_POST['id']),
        'full_name' => trim($_POST['full_name']),
        'email'     => trim($_POST['email']),
        'password'  => $hash
    ];

    echo updateUser($connect, $data);
}

if (isset($_GET['id']))
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['id'];

    echo singleUser ($connect, $id);
}

if (isset($_GET['delete']))
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['delete'];

    echo deleteUser($connect, $id);
}