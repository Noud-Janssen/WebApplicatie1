<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Menu</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/mobile.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
    <?php 
        require_once("php/config.php");
        require_once('php/login.php');
        $title = 'Menu';
        require_once('php/nav.php');
        if (isset($_POST['search'])) {
            echo "<form class='search-bar' method=post>
            <input type='text' name='search-text' value='".$_POST['search-text']."' id=''></input>
            <input type='submit' name='search' value=''></input>
        </form>";
        } else {
            echo "<form class='search-bar' method=post>
                <input type='text' name='search-text' value='' id=''></input>
                <input type='submit' name='search' value=''></input>
            </form>";
        }
        

    ?>
    
    <div class="menu-items">
        <?php 
            if (isset($_POST['search'])) {
                $resultSet = $conn->prepare("SELECT * FROM menu WHERE title LIKE ? OR description LIKE ? ORDER BY title;");
                $resultSet->execute(['%'.$_POST['search-text'].'%', '%'.$_POST['search-text'].'%']);
            } else {
                $resultSet = $conn->prepare("SELECT * FROM menu ORDER BY title");
                $resultSet->execute();
            }
            
            $i = 0;
            $pic_n = 1;

            while ($result = $resultSet->fetch()) {
                if ($result["vegan"] == 1) {
                    $vegan_div = "<div class=vegan-logo>V</div>";
                } else {
                    $vegan_div = "<div class=vegan-empty></div>";
                }
                echo "<div class='menu-item'><div class=title><h2>".$result["title"]."</h2><h2>€".$result["price"]."</h2></div><h2 class='description'>".$result["description"]."</h2>".$vegan_div."</div>";

                if ($i >= 3) {
                    echo "<div class='menu-item menu-pic pic-".$pic_n."'></div>";
                    $i = 0;
                    $pic_n +=1;
                }

                $i += 1;


            }  
        ?>
    </div>
</body>
<script src="js/main.js"></script>
</html>