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
    <nav>
        <h2>Menu</h2>
        <div id="landscape" class="link-wrapper">
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="contact.php">Contact</a>
            <a href="dashboard.php">Dashboard</a>
            <button onclick="toggleLogin()" class="login-button">Login</button>
        </div>
    </nav>
    <nav id="mobile">
        <div class="link-wrapper">
            <a href="index.php">
                <?php 
                    echo file_get_contents("assets/icons/home.svg")
                ?>
            </a>
            <a href="menu.php">
                <?php 
                    echo file_get_contents("assets/icons/menu.svg")
                ?>
            </a>
            <a href="contact.php">
                <?php 
                    echo file_get_contents("assets/icons/contact.svg")
                ?>
            </a>
            <a href="dashboard.php">
                <?php 
                    echo file_get_contents("assets/icons/dashboard.svg")
                ?>
            </a>
            <button onclick="toggleLogin()" class="login-button">
                <?php 
                    echo file_get_contents("assets/icons/login.svg")
                ?>
            </button>
        </div>
    </nav>
    <div id="login" class="n-v">
        <form action="">
            <h4>Username</h4>
            <input type="text" name="" id="">
            <h4>Password</h4>
            <input type="password" name="" id="">
            <br>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
    <div class="menu-items">
        <?php 
            require_once("config.php");
            
            $resultSet = $conn->query("SELECT * FROM menu ORDER BY title");

            while ($result = $resultSet->fetch()) {
                if ($result["vegan"] == 1) {
                    $vegan_div = "<div class=vegan-logo>V</div>";
                } else {
                    $vegan_div = "<div class=vegan-empty></div>";
                }
                echo "<div class='menu-item'><div class=title><h2>".$result["title"]."</h2><h2>€".$result["price"]."</h2></div><h2 class='description'>".$result["description"]."</h2>".$vegan_div."</div>";
            }  
        ?>
    </div>
</body>
<script src="js/main.js"></script>
</html>