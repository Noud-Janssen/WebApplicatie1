<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        $title = "<a href='dashboard.php'>Dashboard</a> <span class='crumb'>|Berichten|</span>";
        require_once('php/nav.php');

        if (isset($_POST['delete'])) {
            $prepared = $conn->prepare("DELETE FROM `berichten` WHERE id = ?");
            $prepared->execute([$_POST['id']]);
        }


        $resultset = $conn->query("SELECT * FROM berichten ORDER BY id DESC");

        echo "<div class='berichten-box'>";
        while ($result = $resultset->fetch()) {
            echo "<form method='post' class='bericht'>`<h2>".$result['onderwerp']."</h2><h4>Van: ".$result['email']."</h4><p>".$result['bericht']."</p><input type='submit' id='delete' name='delete' value='delete'><input type='hidden' name='id' value='".$result['id']."'></form>";
        }
        echo "</div>";
        
    ?>
    

    
</body>
</html>