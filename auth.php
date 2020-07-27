<!DOCTYPE html>
<html lang="en">
    <head>
        
        <? 
            $websiteTitle = "Registration";
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

            <? 
                if($_COOKIE['login'] == ''):
            ?>

                <h2 class="main__title">Authentication</h2>
                <form method="post">
 
                    <label for="login">Login</label><br>
                    <input class="main__form" type="text" name="login" id="login" placeholder="your login">
                    <br>                
                    <label for="password">Password</label><br>
                    <input class="main__form" type="password" name="password" id="password" placeholder="your password">
                    <br>   
                    <div class="main__alert" id="errorBlock"></div>   
                    <div class="main__alert" id="authBlock"></div>  

                    <button class="main__button" type="button" id="auth_user">Login</button>
                </form>
            <? 
                else:
            ?>
            <h2><?=$_COOKIE['login']?></h2>
            <button class="main__button" id="exit_btn" >Exit</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $('#exit_btn').click(function() {

            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function (data) {                     
                    document.location.reload(true);  
                }
            });
        });

        $('#auth_user').click(function() {
            var login = $('#login').val();
            var pass = $('#password').val();

            $.ajax({
                url: 'ajax/auth.php',
                type: 'POST',
                cache: false,
                data: {'login' : login , 'password' : pass},
                dataType: 'html',
                success: function (data) {
                    if(data == "Good") {                        
                        $('#authBlock').text("Logined");
                        document.location.reload(true);
                    }
                    else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        });

    </script>


    </body>
</html>