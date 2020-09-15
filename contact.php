<!doctype html>
<html lang="en">
    <head>
        <meta name="Description" content="Homepage for pieces of blonde, an Etsy shop where I hand-craft polymer clay earrrings.">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact</title>
        <link rel="stylesheet" href="styles.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>

    <body>
        <?php include('PHPMailer/formscript.php');?>
        <header>
        <br>
        <br>
            <a href="index.html">
                <img src="images/logo.png" alt="Pieces of Blonde logo" class="logo">
            </a>        
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="https://www.etsy.com/shop/piecesofblonde">Shop</a></li>
                </ul>
            </nav>
        </header>

        <hr class="dividers"/>

        <header class="form_header">Contact Me</header>
        
        <?php if (!empty($msg)) {
            echo "<h3>$msg</h3>";
        } ?>
        
        <form id="form" class="topBefore" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                
            <input name="name" id="name" type="text" placeholder="NAME">
            <input name="email" id="email" type="email" placeholder="E-MAIL">
            <textarea name="message" id="message" type="text" placeholder="MESSAGE"></textarea>
            <input id="submit" type="submit" value="SEND">
            <div style="text-align: center;">
                <div class="g-recaptcha" data-sitekey="6Ldgfb4ZAAAAABp3nbgj5WPdV95utNtTToY5f1zN" style="display: inline-block;"></div>
            </div>          
        </form>
        
        <br>
        
        <hr class="dividers"/>

        <footer style="display: block;" class="disclaimer">
            <h4>All designs and photos are property of piecesofblonde</h4>
        </footer>
        
        <?php require_once 'functions/sanitize.php';?>

    </body>

</html>