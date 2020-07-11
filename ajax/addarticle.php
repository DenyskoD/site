<?php
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
    $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));


    $error = "";
    if(strlen($title) <= 5)
        $error = "Set title";
    else if(strlen($intro) <= 7)
        $error = "Set intro";
    else if(strlen($text) <= 10)
        $error = "Set text";


    if ($error != "" ) {
        echo $error;
        exit();
    }
    


    require_once "../mysql_connect.php";

    $sql = "INSERT INTO articles(title, intro, text , date , author) VALUES(?, ?, ?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute([$title, $intro , $text , time() , $_COOKIE['login']]);

    echo "Good";
    
?>
