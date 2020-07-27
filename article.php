<? 
    if($_COOKIE["login"] == "") {
        header("Location: /reg.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <? 
            $websiteTitle = "Article";
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
                <h2 class="main__title">Adding article</h2>
                <form method="post">
                    <label for="title">Title</label><br>
                    <input class="main__form" type="text" name="title" id="title" placeholder="Article name">
                
                    <br>   

                    <label for="intro">Intro</label><br>
                    <textarea class="main__form" name="intro" id="intro" placeholder="Article intro"></textarea>

                    <br>

                    <label for="text">Text</label><br>
                    <textarea class="main__form" name="text" id="text" placeholder="Article text"></textarea>

                    <div class="main__error" id="errorBlock"></div>
                    <div class="main__alert" id="alertBlock"></div>      

                    <button class="main__button" type="button" id="add_article">Add</button>
                </form>

            </div>


            <? include_once "blocks/aside.php"; ?>
        </div>
    </div>

</main>



<? include_once "blocks/footer.php"; ?>
</div>  <!-- page -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $('#add_article').click(function() {
            var title = $('#title').val();
            var intro = $('#intro').val();
            var text = $('#text').val();

            $.ajax({
                url: 'ajax/addarticle.php',
                type: 'POST',
                cache: false,
                data: {'title' : title, 'intro' : intro , 'text' : text},
                dataType: 'html',
                success: function (data) {
                    if(data == "Good") {
                        $("#alertBlock").show();
                       $("#alertBlock").text("Added!")
                       $("errorBlock").hide();
                    }
                    else {
                        $("errorBlock").show();
                        $("errorBlock").text(data);
                    }
                }
            });
        });

    </script>


    </body>
</html>