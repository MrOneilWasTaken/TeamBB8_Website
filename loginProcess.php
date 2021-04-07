<?php 
    require_once("header.php");

    function validateLogin() {
        
        $input  = array();
        $errors = array();

        $input['username'] = filter_has_var(INPUT_POST, 'username') ? $input['username'] : null;
        $input['username'] = trim($input['username']);
        $input['username'] = filter_var($input['username'], FILTER_SANITIZE_SPECIAL_CHARS);

        $input['password'] = filter_has_var(INPUT_POST, 'password') ? $input['password'] : null;

    try {
        unset($_SESSION['errors']);
        $dbConn = getConnection();

        $checkUsername = "SELECT password_hash
        FROM admin_user
        WHERE username = :username";

        $prepareCheck = $dbConn->prepare($checkUsername);
        $prepareCheck->execute(array(':username' => $input['username']));

        $user = $prepareCheck->fetchObject();

        if($user) {
            $hash = $user->passwordHash;
            if(password_verify($input['password'], $hash)) {
                setSession('logged-in', 'true');
                header('Location: admin.php'); ?>
                <div class="alert alert-success">
                    <h1>Successful Login!</h1>
                    Welcome, <?php echo $user->username; ?>
                </div>
                <?php 
            } else
            {
                $errors[] = "Username or Password is incorrect";
            }
        }
        else {
            $errors[] = "Username or Password is incorrect";
        }

    } catch (Exception $e) {
        echo "Login Error: ".$e->getMessage();
    }

    return array($input, $errors);
}

list($input, $errors) = validateLogin();

if($errors) { 
    header('Location: '.$_SERVER['HTTP_REFERER']);?>
    <?php setSession('errors', showErrors($errors)); ?>
</div>
    
<?php } else {
    setSession('logged-in', 'true');
}

    require_once("footer.php");
?>