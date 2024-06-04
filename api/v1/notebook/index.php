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
$page = isset($_GET['page']) ? (int)$_GET['page'] : null;
//10 is default limit if not provided
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

//...!!!REPLACE WITH YOUR user name and password!!!...

$database = new config\Database("localhost", "notebookdb", "notebook_user", "12345password");
//.......................................................

$gateway = new gateways\NotebookGateway($database);

$controller = new controllers\NotebookController($gateway);

$method = $_SERVER["REQUEST_METHOD"]; // Get the HTTP method

if ($method === 'GET' && $page !== null) 
{
    // If a page number is provided, handle pagination
    $controller->getAllByPage($page, $limit);
} elseif ($method === 'POST' || $method === 'GET' || $method === 'PATCH' || $method === 'DELETE') 
{
    // If it's a POST, GET, PATCH, or DELETE request, handle it as a collection request or resource request
    $controller->processRequest($method, $id);

} else 
{
    // If no page or id is specified, default to the first page
    $controller->getAllByPage(1, $limit);
}
