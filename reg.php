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
            <div class="main__content">

                <form method="post">
                    <label for="username">Your Name</label>
                    <input class="reg__form" type="text" name="username" id="username" placeholder="your name">
                    <br>
                    <label for="login">Login</label>
                    <input class="reg__form" type="text" name="login" id="login" placeholder="your login">
                    <br>
                    <label for="email">Email</label>
                    <input class="reg__form" type="text" name="email" id="email" placeholder="your email">
                    <br>
                    <label for="password">Password</label>
                    <input class="reg__form" type="password" name="password" id="password" placeholder="your password">
                    <br>   
                    <div class="reg__alert" id="errorBlock"></div>
                    <div class="reg__alert" id="authBlock"></div>      

                    <button class="reg__button" type="button" id="reg_user">Register</button>
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
        $('#reg_user').click(function() {
            var name = $('#username').val();
            var email = $('#email').val();
            var login = $('#login').val();
            var pass = $('#password').val();

            $.ajax({
                url: 'ajax/reg.php',
                type: 'POST',
                cache: false,
                data: {'username' : name, 'email' : email , 'login' : login , 'password' : pass},
                dataType: 'html',
                success: function (data) {
                    if(data == "Good") {
                        $('#errorBlock').hide();
                        $('#authBlock').show();
                        $('#authBlock').text("Registered");
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