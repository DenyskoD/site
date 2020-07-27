<!DOCTYPE html>
<html lang="en">
    <head>
        <? 
            require_once "mysql_connect.php";

            $sql = "SELECT * FROM `articles` WHERE `id` = :id";
            $id = $_GET['id'];
            $query = $pdo->prepare($sql);
            $query->execute(['id' => $id]);

            $article = $query->fetch(PDO::FETCH_OBJ);

            $websiteTitle = $article->title;
            include_once "blocks/head.php"; 
        ?>
    </head>
    <body>
<div class="page">
<? include_once "blocks/header.php"; ?>



<main class="main">

    <div class="container">
        <div class="main__inner">
            <div class="main__content content--news">
              
                <h2 class="main__title"><?=$article->title?></h2>
                <p><b>Author:</b> <mark><?=$article->author?></mark></p>
                <? 
                    $date = date("d ", $article->date);  
                    $array = ["January" , "February" , "March" , "May" , "June" , "July" , "August" , "September" , "October", "November" , "December"];                  
                    $date .= $array[date('n', $article->date) -1];
                    $date .= " at".date(' H:i', $article->date);
                ?>
                <p><b>Published:</b> <u><?=$date?></u></p>
                <p>
                    <?=$article->intro?>
                    <br><br>
                    <?=$article->text?>
                </p>

                <h4 class="main__title"><br><br>Comments</h4>
                <? 
                if($_COOKIE['login'] != ''):
                ?>
                <form method="post" action="/news.php?id=<?=$_GET['id']?>">
                <label for="mess">Comment</label><br>
                <textarea name="mess" id="mess" class="main__form"></textarea>
                <button type ="submit" id="mess_send" class="main__button">Comment</button>
                </form>
                <? 
                else:
                ?>
                <? 
                    if($_POST['mess'] != "") {
                        $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                        $sql = 'INSERT INTO comments(author , mess , article_id) VALUES (?,?,?)';
                        $query = $pdo->prepare($sql);
                        $query->execute([$_COOKIE['login'], $mess , $_GET['id']]);
                    }

                    $sql = "SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC";
                    $query = $pdo->prepare($sql);
                    $query->execute(['id' => $_GET['id']]);
                    $comments = $query->fetchAll(PDO::FETCH_OBJ);

                    foreach ($comments as $comment) {
                        echo "<div class='comments__block'>
                            <h4>$comment->author</h4>
                            <p>$comment->mess</p>
                        </div>";
                    }
                ?>
                <? 
                endif;
                ?>
            </div>


            <? include_once "blocks/aside.php"; ?>
        </div>
    </div>

</main>



<? include_once "blocks/footer.php"; ?>
</div>  <!-- page -->
    </body>
</html>