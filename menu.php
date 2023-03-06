<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Menu</title>
    <link rel="stylesheet" href="css/main.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
    <nav>
        <h2>Menu</h2>
        <div class="link-wrapper">
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="contact.php">Contact</a>
            <a href="dashboard.php">Dashboard</a>
            <button onclick="toggleLogin()" class="login-button">Login</button>
        </div>
    </nav>
    <div id="login">
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
            $is_vegan = true;
            $vegan_div;
            $name = "item naam";
            $descr = "hbafjvvjvnkkaseli lsvbweBFlkkvlvlivvILw webhjasgdajssgdflhv;IVieglEWBFLJVB";
            for ($i = 0; $i < 10; $i++) {
                if ($is_vegan) {
                    $vegan_div = "<div class='vegan-logo'>V</div>";
                    $is_vegan = false;
                } else {
                    $vegan_div = "<div class='vegan-empty'></div>";
                    $is_vegan = true;
                }
                $item = "<div class='menu-item'><div class=title><h2>".$name."</h2><h2>€".$i."</h2></div><h2 class='description'>".$descr."</h2>".$vegan_div."</div>";
                echo $item;
            }
            
        ?>
    </div>
</body>
<script src="js/main.js"></script>
</html>