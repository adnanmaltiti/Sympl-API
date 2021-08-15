<?php

require_once '../require.php';

if (isset($_GET) && !isset($_GET['id']) && !isset($_GET['delete']) && !isset($_POST))
{
    echo readTransactions($connect);
}

if (isset($_POST['goods']) && !isset($_POST['id']))
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'goods'     => trim($_POST['goods']),
        'quantity'  => trim($_POST['quantity'])
    ];

    echo createTransaction($connect, $data);
}

if (isset($_POST['id']))
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'id'        => trim($_POST['id']),
        'goods'     => trim($_POST['goods']),
        'quantity'  => trim($_POST['quantity'])
    ];

    echo updateTransaction($connect, $data);
}

if (isset($_GET['id']))
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['id'];

    echo singleTransaction ($connect, $id);
}

if (isset($_GET['delete']))
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['delete'];

    echo deleteTransaction($connect, $id);
}