<!DOCTYPE html>
<html lang="en">
    <head>
        
        <? 
            $websiteTitle = "Contact";
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
                    <h2 class="main__title">Contact Us</h2>
                <form method="post">
                    <label for="username">Your Name</label><br>
                    <input class="main__form" type="text" name="username" id="username" placeholder="your name">
                    <br> 
                    <label for="email">Email</label><br>
                    <input class="main__form" type="text" name="email" id="email" placeholder="your email">
                    <br>
                    <label for="mess">Message</label><br>
                    <textarea name="mess" id="mess" class="main__form" placeholder="email message"></textarea>
                    <br>   
                    <div class="main__error" id="errorBlock"></div>
                    <div class="main__alert" id="authBlock"></div>      

                    <button class="main__button" type="button" id="mess_send">Send message</button>
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
        $('#mess_send').click(function() {
            var name = $('#username').val();
            var email = $('#email').val();
            var mess = $('#mess').val();

            $.ajax({
                url: 'ajax/mail.php',
                type: 'POST',
                cache: false,
                data: {'username' : name, 'email' : email , 'mess' : mess},
                dataType: 'html',
                success: function (data) {
                    if(data == "Good") {
                        $('#errorBlock').hide();
                        $('#authBlock').show();
                        $('#authBlock').text("Sended");
                        $('username').val("");
                        $('email').val("");
                        $('mess').val("");
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