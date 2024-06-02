<?php

namespace controllers;

class NotebookController
{
	public function __construct(private \gateways\NotebookGateway $gateway)
	{

	}

	public function processRequest(string $method, ?string $id): void
  {
    if ($id) {

            
       $this->processResourceRequest($method, $id);
            
     } else {

       $this->processCollectionRequest($method);      
     }
  }

  private function processResourceRequest(string $method, string $id): void
  {
  	$contact = $this->gateway->get($id);

  	//getting 404 if the contact does not exist
  	if ( ! $contact) 
  	{
      http_response_code(404);
      echo json_encode(["message" => "Contact is not found"]);
      return;
    }

    switch($method) 
    {
    	case "GET":
    		echo json_encode($contact);
    		break;

    	case "PATCH":

    		$data = (array) json_decode(file_get_contents("php://input"), true);

        // check any data errors
        $errors = $this->getValidationErrors($data, false);
                
        if ( ! empty($errors)) 
        {
        	http_response_code(422);

        	// sending the validation errors in the response body
          echo json_encode(["errors" => $errors]);
          break;
        }

        // if no errors, creating a new entry in the database
        $rows = $this->gateway->update($contact, $data);

        http_response_code(201);
        echo json_encode([
					"message" => "Contact $id updated",
          "rows" => $rows
        ]);
        break;

    }

  }



  private function processCollectionRequest(string $method): void
  {
      switch ($method) 
      {
       case "GET":
        echo json_encode($this->gateway->getAll());
        break;
                
       case "POST":

        $data = (array) json_decode(file_get_contents("php://input"), true);

        // check any data errors
        $errors = $this->getValidationErrors($data);
                
        if ( ! empty($errors)) 
        {
        	http_response_code(422);

        	// sending the validation errors in the response body
          echo json_encode(["errors" => $errors]);
          break;
        }

        // if no errors, creating a new entry in the database
        $id = $this->gateway->create($data);

        http_response_code(201);
        echo json_encode([
					"message" => "Contact was created",
          "id" => $id
        ]);
        break;
        // var_dump($data);
            
        default:
          http_response_code(405);
          header("Allow: GET, POST");
     	}
  }
    
  private function getValidationErrors(array $data, bool $is_new = true): array 
  {
  	$errors = [];

  	// check that full_name is not empty
    if ($is_new && empty($data["full_name"])) {
        $errors[] = "Full name is required";
    }
    
    // check that phone is not empty
    if ($is_new && empty($data["phone"])) {
        $errors[] = "Phone is required";
    }
    
    // validating email format
   if ($is_new && empty($data["email"])) 
   {
    	$errors[] = "Email is required";

		} elseif (isset($data["email"]) && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) 
		{
    	$errors[] = "Invalid email format";
		}
    
    // validating date of birth format
		if (array_key_exists("date_of_birth", $data)) {

		    $date = \DateTime::createFromFormat('Y-m-d', $data["date_of_birth"]);

		    $dateErrors = $date ? $date::getLastErrors() : null;

				if ($date === false || ($dateErrors && $dateErrors["warning_count"] > 0)) 
				{
    			$errors[] = "Invalid date of birth format. Expected format is YYYY-MM-DD.";
				}
		}


    // VALIDATING PHOTO PATH

		$photoPath = null;

		if (isset($data["photo_path"])) 
		{
			$photoPath = __DIR__ . '/../../' . $data["photo_path"];
		}
    
    if ($photoPath && file_exists($photoPath)) 
    {
    	// Check file types
  		$allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
  		$fileType = pathinfo($photoPath, PATHINFO_EXTENSION);

  		if (!in_array($fileType, $allowedTypes)) 
  		{
  			$errors[] = "Invalid photo file type. Allowed types are: " . implode(', ', $allowedTypes);
  		}

  		// Check file size (max 5MB)
  		if (filesize($photoPath) > 5000000) 
  		{
  			$errors[] = "Photo file size is too large. Maximum size is 5MB.";
  		}

    } elseif ($photoPath && !file_exists($photoPath)) {
    	$errors[] = "Photo file does not exist";
    }

    return $errors;

  }

}
