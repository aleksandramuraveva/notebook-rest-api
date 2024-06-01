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

// set content-type to json
// header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[4] != "notebook") {
    http_response_code(404);
    exit;
}

$id = $parts[5] ?? null;

// var_dump($parts); //check delete

$controller = new controllers\NotebookController;

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);