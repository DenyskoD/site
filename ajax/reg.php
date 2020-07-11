<? 
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $error = "";
    if(strlen($username) <= 3)
        $error = "Set your name";
    else if(strlen($login) <= 3)
        $error = "Set your login";
    else if(strlen($email) <= 3)
        $error = "Set your email";
    else if(strlen($pass) <= 3)
        $error = "Set your password";

    if ($error != "" ) {
        echo $error;
        exit();
    }
    

    $hash = "renfpq385u1fwnwlqf";
    $pass = md5($pass . $hash);

    require_once "../mysql_connect.php";

    $sql = "INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute([$username, $email , $login , $pass]);

    echo "Good";
    
?>
