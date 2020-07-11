<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">
                <img class="header__img" src="/img/1.png" alt="logo">
            </div>

            <nav class="nav">  
                <a class="nav__link" href="/">Home</a>
                <a class="nav__link" href="/contact.php">Contact</a>
            <? 
                if($_COOKIE['login'] != '')
                echo '<a class="nav__link" href="/article.php">Articles</a>';
            ?>         
                
            </nav>
            <? 
                if($_COOKIE['login'] == ''):
            ?>
            <nav class="nav reg__nav">           
                <a class="nav__link" href="/reg.php">Sign Up</a>
                <a class="nav__link" href="/auth.php">Login</a>
            </nav>

            <? 
                else:
            ?>
            <a class="nav__link" href="/auth.php"><?=$_COOKIE['login']?></a>
            <? 
                endif;
            ?>
        </div>  <!-- inner -->
    </div> <!-- container -->
</header> <!-- header -->