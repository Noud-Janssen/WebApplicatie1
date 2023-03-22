<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/mobile.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
    <?php 
        require_once('php/config.php');
        include_once('php/login.php');
        $title = 'Home';
        include_once('php/nav.php');
    ?>
    <div id="picture-wrapper">
        <h1>Restaurant Arrogant</h1>
    </div>
    <div class="text-field">
        <div class="col-50">
        <h2>Openingstijden</h2>
        <p>Maandag: gesloten <br> Dinsdag: 17:00 <br> Woensdag: 13:00 <br> Donderdag: 13:00 <br> Vrijdag: 13:00 <br> Zaterdag: 11:00 <br> Zondag: 11:00</p>
        </div>

        <div class="col-50">
            <h2>Snel naar:</h2>
            <p><a href="menu.php">Menu</a></p>
            <p><a href="reserveren.php">Reserveren</a></p>
            <p><a href="contact.php">Contact</a></p>
        </div>
        
        
    </div>
</body>
<script src="js/main.js"></script>
</html>