<?php
require_once 'FileHandler.php';
require_once 'ActionPerformer.php';

if(!isset($_REQUEST['action']) || empty($_REQUEST['action']) || !isset($_FILES['file'])){
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request'
    ]);
}

// Getting Request Parameters
$action = $_REQUEST['action'];
$FileHandler = new App\FileHandler($_FILES['file']);

// Validating file
$validation = $FileHandler->validateCsvFile();
if(isset($validation['status']) && $validation['status'] == 'error'){
    echo json_encode($validation);
    die();
}

// Performing Action
$ActionPerformer = new App\ActionPerformer();
switch ($action){
    case 'echo':
        $output = $ActionPerformer->echo($FileHandler->matrix);
        break;
    case 'invert':
        $output = $ActionPerformer->invert($FileHandler->matrix);
        break;
    case 'flatten':
        $output = $ActionPerformer->flatten($FileHandler->matrix);
        break;
    case 'sum':
        $output = $ActionPerformer->sum($FileHandler->matrix);
        break;
    case 'multiply':
        $output = $ActionPerformer->multiply($FileHandler->matrix);
        break;
    default:
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid action.'
        ]);
        break;
}
echo $output;