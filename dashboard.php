<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Dashboard</title>
    <link rel="stylesheet" href="css/main.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
    <?php 
        require_once("php/config.php");
        require_once('php/login.php');
        $title = 'Dashboard';
        require_once('php/nav.php');
    ?>
    <div class="nav-margin"></div>
    <div class="dashboard-links">
        <a href="edit-menu.php"><h4>Menu</h4></a>
        <a href="edit-accounts.php"><h4>Accounts</h4></a>
        <a href="show-messages.php"><h4>Berichten</h4></a>
        <a href="show-reservations.php"><h4>Reserveringen</h4></a>
    </div>
    

</body>

</html>