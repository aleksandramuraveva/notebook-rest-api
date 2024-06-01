<?php

declare(strict_types=1);

// echo "test";

// adding autoloading of classes
spl_autoload_register(function ($class) {
    // converting to a relative path
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = $_SERVER['DOCUMENT_ROOT'] . "/notebook-rest-api/src/{$path}.php";

    if (file_exists($file)) {
        require $file;
    }
});


//exception and error handlers
set_error_handler("core\ErrorHandler::handleError");
set_exception_handler("core\ErrorHandler::handleException");

//set content-type to json
header("Content-type: application/json; charset=UTF-8");


$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[4] != "notebook") {
    http_response_code(404);
    exit;
}

$id = isset($parts[5]) && $parts[5] !== '' ? $parts[5] : null;

// var_dump($id); //check delete

// var_dump($parts); //check delete

$database = new config\Database("localhost", "notebookdb", "notebookDB", "12345password");
// $database->getConnection();

$gateway = new gateways\NotebookGateway($database);

$controller = new controllers\NotebookController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);