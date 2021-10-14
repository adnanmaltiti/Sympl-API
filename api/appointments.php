<?php

require_once '../require.php';

if (isset($_GET) && !isset($_GET['id']) && !isset($_GET['delete']) && !isset($_POST['id']) && !isset($_POST['full_name']))
{
    echo readAppointments($connect);
}

if (isset($_POST['aptdesc']) && !isset($_POST['id']))
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'aptdesc'     => trim($_POST['aptdesc']),
        'aptdoctor'     => trim($_POST['aptdoctor']),
        'apthospital'     => trim($_POST['apthospital']),
        'aptdate'     => trim($_POST['aptdate'])
    ];

    echo createAppointment($connect, $data);
}

if (isset($_POST['id']))
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'id'        => trim($_POST['id']),
        'aptdesc'     => trim($_POST['aptdesc']),
        'aptdoctor'     => trim($_POST['aptdoctor']),
        'apthospital'     => trim($_POST['apthospital']),
        'aptdate'     => trim($_POST['aptdate'])
    ];

    echo updateAppointment($connect, $data);
}

if (isset($_GET['id']))
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['id'];

    echo singleAppointment ($connect, $id);
}

if (isset($_GET['delete']))
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['delete'];

    echo deleteAppointment($connect, $id);
}