<!DOCTYPE html>
<html lang="en">
    <head>
        
        <? 
            $websiteTitle = 'Blog';
            include_once "blocks/head.php"; 
        ?>
    </head>
    <body>
<div class="page">
<? include_once "blocks/header.php"; ?>



<main class="main">

    <div class="container">
        <div class="main__inner">
            <div class="main__content">
                <? 
                    require_once "mysql_connect.php";

                    $sql = "SELECT * FROM `articles` ORDER BY `date` DESC";
                    $query = $pdo->query($sql);
                    while($row = $query->fetch(PDO::FETCH_OBJ)) {
                        echo "<div class='article'><h2 class='main__title' >$row->title</h2><p>$row->intro</p>
                        <p><b>Author:</b><mark>$row->author</mark></p>
                        <a href='/news.php?id=$row->id' title='$row->title'>
                        <button class='reg__button'>To article</button>
                        </a></div>";
                    }
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