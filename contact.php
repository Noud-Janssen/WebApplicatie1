<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Contact</title>
    <link rel="stylesheet" href="css/main.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
    <?php 
        require_once('php/config.php');
        require_once('php/login.php');
        $title = 'Contact';
        require_once('php/nav.php');?>
        
    </body>
    <script src="js/main.js"></script>
    <form action="contact.php" method="post" id="contact-form">
            <h2>Onderwerp</h2>
            <input type="text" name="onderwerp" id="">
            <h2>Email</h2>
            <input type="email" name="email" id="">
            <h2>Bericht</h2>
            <textarea name="bericht" id="bericht-box" cols="30" rows="10"></textarea>
            <input type="submit" value="verstuur">
        </div>
    </form>
</html>