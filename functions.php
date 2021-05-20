<?php /**
 * functions
 * Author: Lewis Oxley-Jenkins
 */

function getConnection() 
{
	try {
		$connection = new PDO("mysql:host=localhost;dbname=sepshowlist",
			"root", "");
		$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $connection;
	} catch (Exception $e) {
		throw new Exception("Connection error ". $e->getMessage(), 0, $e);
	}
}

/**
 * Shows Errors
 * 
 * Creates a variable, $output as an empty string, for each 
 * error in the $errors array, concatinate that to the 
 * $output string. 
 * 
 * @param array $errors an output of function validateShow() 
 *                      if there are any validation errors.
 *                      
 * 
 * @return $output
 */
function showErrors(array $errors) {

    $output = '';

    foreach($errors as $msg)
    {
        $output .= $msg."<br>";
    }
    return $output;
}


/**
 * Checks the inputs of the data inputed in the forms 
 * 
 * 2 arrays are created, one called $input, the other $errors.
 * The data which has been inputted into the form is then checked
 * for empty fields. To prevent use of categories and studios that 
 * don't exist a check is done to make sure the users haven't 
 * attempted to use studios or categories that don't exist. A check
 * is also done on the end date, to make sure it comes after the
 * start date if it has been added.
 * 
 * @return array ($input, $errors)
 */
function validateShow() {
    $input = array();
    $errors = array();

    $dbConn = getConnection();

    $showCat = "SELECT * FROM category";
    $prepareCat = $dbConn->prepare($showCat);
    $prepareCat->execute();

    $showStu = "SELECT * FROM studio";
    $prepareStu = $dbConn->prepare($showStu);
    $prepareStu->execute();

    $input['showName']  = filter_has_var(INPUT_POST, 'showName') ? $_POST['showName'] : null;

    $input['showDesc']  = filter_has_var(INPUT_POST, 'showDesc') ? $_POST['showDesc'] : null;

    $input['isAiring']  = filter_has_var(INPUT_POST, 'isAiring') ? $_POST['isAiring'] : null;

    $input['showEp']    = filter_has_var(INPUT_POST, 'showEp') ? $_POST['showEp'] : null;

    $input['startDate'] = filter_has_var(INPUT_POST, 'startDate') ? $_POST['startDate'] : null;

    $input['endDate']   = filter_has_var(INPUT_POST, 'endDate') ? $_POST['endDate'] : null;

    $input['showCat']   = filter_has_var(INPUT_POST, 'showCat') ? $_POST['showCat'] : null;
    
    //catArr is an array of all categories taken from the database 
    $catArr = array();
    while ($catRow = $prepareCat->fetchObject()) {
        $catArr[] = $catRow->catID;
    }

    $input['showStu']   = filter_has_var(INPUT_POST, 'showStu') ? $_POST['showStu'] : null;

    //stuArr is an array of all studios taken from the database
    $stuArr = array();
    while ($stuRow = $prepareStu->fetchObject()) {
        $stuArr[] = "$stuRow->stuID";
    }

    $input['showImage']  = filter_has_var(INPUT_POST, 'showImage') ? $_POST['showImage'] : null;

    $input['showID']   = filter_has_var(INPUT_POST, 'showID') ? $_POST['showID'] : null;

    //empty not needed, required attribute on form

    if(!in_array($input['showCat'], $catArr)) {
        $errors[] = 'Category does not exist';
    }

    if(!in_array($input['showStu'], $stuArr)) {
        $errors[] = 'Studio does not exist';
    }

    if($input['startDate'] > $input['endDate']) {
        if(!empty($input['endDate'])) { 
            $errors[] = 'End date cannot be before Start date';
        }
    }

    return array ($input, $errors);
}

/**
 * sets session variable and its value
 * 
 * @param string $k the name of the session variable
 * @param string $v sets the value of the session variable
 * 
 * @return true;
 */
function setSession($k, $v) {
    $_SESSION[$k] = $v;
    return true;
}


/**
 * Checks to see if session variable exists
 * 
 * @param string $k is the name of the session varible
 * 
 * @return $_SESSION[$k]
 */
function getSession($k) {
    if(isset($_SESSION[$k])) {
        return $_SESSION[$k];
    }
}
