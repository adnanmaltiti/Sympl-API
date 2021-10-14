<?php

require_once '../require.php';

if (isset($_GET) && !isset($_GET['id']))
{
    echo readDoctors($connect);
}

if (isset($_GET['id']))
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

    $id = $_GET['id'];

    echo singleDoctor ($connect, $id);
}