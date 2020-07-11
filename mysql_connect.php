<?    
    $user = "root";
    $password = "root";
    $db = "blog";
    $host = "site";

    $dsn = "mysql:host=".$host.";dbname=".$db;
    $pdo = new PDO($dsn, $user, $password); 

?>