<?php

/**
 * name, email, message
 */

$response = "";
$error = false;
try {
    if (count($_POST) != 3) {
        $errorMessage = "Not all fields are present";
        throw new Exception($errorMessage);
    }

    if (
        !isset($_POST['name']) ||
        trim($_POST['name']) == ""
    ) {
        $errorMessage = "name not found";
        throw new Exception($errorMessage);
    }

    if (
        !isset($_POST['email']) ||
        trim($_POST['email']) == ""
    ) {
        $errorMessage = "email not found";
        throw new Exception($errorMessage);
    }

    if (
        !isset($_POST['message']) ||
        trim($_POST['message']) == ""
    ) {
        $errorMessage = "message not found";
        throw new Exception($errorMessage);
    }
} catch (\Throwable $th) {
    http_response_code(400);
    $error = true;
    $response = $th->getMessage();
} finally {
    if($error){
        $data = $response;
    }else{
        $data = json_encode($_POST);
    }
    
    echo json_encode([
        'error' => $error,
        'data' => $data
    ]);

}
