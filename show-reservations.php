<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Reserveringen</title>
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
        $title = "<a href='dashboard.php'>Dashboard</a> <span class='crumb'>|Reserveringen|</span>";
        require_once('php/nav.php');
    ?>

    <div id="rooster-reserveringen">
    <?php 

    $days = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saterday");
        
        for ($i = 0; $i < 14; $i += 1) {
            $date = date('Y-m-d', strtotime(' + '.$i.' days'));
            echo "<h2 class='dagHeader' >".$days[date('w', strtotime(' + '.$i.' days'))];
            if ($i == 0) {
                echo "<span id='td'> today</span>";
            }
            echo "</h2>";
            $resultset = $conn->query("SELECT * FROM reserveringen WHERE date = '".$date."';");
            while ($result = $resultset->fetch()) {
                echo "<div class='reservering'>";
                echo "<p>Naam: </p>";
                echo "<p>".$result['name']."</p>";
                echo "<p>E-mail:</p>";
                echo "<p>".$result['email']."</p>";
                echo "<p>Aantal personen: </p>";
                echo "<p>".$result['aantal']."</p>";
                echo "<p>Telefoon:</p>";
                echo "<p>".$result['telefoon']."</p>";
                echo "</div>";
            }
            
        }
    ?>
    </div>
</body>