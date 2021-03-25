<?php 

function getConnection() 
{
	try {
		$connection = new PDO("mysql:host=localhost;dbname=sepshowlist",
			"root", "");
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $connection;
	} catch (Exception $e) {
		throw new Exception("Connection error ". $e->getMessage(), 0, $e);
	}
}

function showErrors(array $errors) {

    $output = '';

    foreach($errors as $msg)
    {
        $output .= $msg."<br>";
    }
    return $output;
}
?>