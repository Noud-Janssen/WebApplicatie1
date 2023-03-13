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
    <script src="js/main.js"></script>
    <nav>
        <h2>Dashboard</h2>
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
    <div id="sidebar">
        <?php 
            require_once("config.php");

            if(isset($_POST['delete'])) {
                $conn->query("DELETE FROM menu where id = ".$_POST['id'].";");
            }

            if(isset($_POST['add-item'])) {
                $conn->query("INSERT INTO menu(title,description,price,vegan) VALUES('[EMPTY]','',0,0);");
            }

            if(isset($_POST['submit'])) {
                $vegan_numb = 0;
                if (isset($_POST['vegan'])) {
                    $vegan_numb = 1;
                }
                $conn->query("UPDATE menu
                SET title = '".$_POST['title']."', description = '".$_POST['description']."', price = '".$_POST['price']."', vegan = '".$vegan_numb."'  WHERE id = ".$_POST['id'].";");
            };

            $resultSet = $conn->query("SELECT * FROM menu ORDER BY title != '[EMPTY]', title");

            $i = 0;
            while ($result = $resultSet->fetch()) {
                $i++;
                echo "<button id='id-".$result['id']."' 
                data-title=\"".$result['title']."\" 
                data-description=\"".$result['description']."\" 
                data-price=\"".$result['price']."\" 
                data-vegan=\"".$result['vegan']."\"
                onclick='select(this.id)' class='item'>".$result['title']."</button>";
            }  
        ?>
    </div>
    <form class="back-form" method="post">
        <h2>Select item</h2>
        <h3>or</h3>
        <input type="submit" name="add-item" id="add-item-btn" value="add item"></input>
    </form>
        
    <form action="" method="post" id="edit">
        <a href="dashboard.php" id="close-form"><h3 onclick="close()">X</h3></a>
        <div class="input-box">
            <h2>Title:</h2>
            <input type="text" name="title" id="name-of-pizza" value="">
        </div>
        <div class="input-box">
            <h2>Price:</h2>
            <input type="number" name="price" id="price-of-pizza">
        </div>
        <div class="input-box" id="description">
            <h2>Description:</h2>
            <input type="text" name="description" id="description-of-pizza">
        </div>
        <div class="input-box row">
            <h2>Vegan:</h2>
            <input type="checkbox" name="vegan" id="vegan-of-pizza">
        </div>
        <div class="input-box" id="buttons-box">
            <input type="submit" name="submit" id="" value="Update">
            <input type="hidden" name="id" id="id-value">
            <p id="id-view"></p>
            <input type="submit" name="delete" id="delete" value="Delete">
        </div>
    </form>

</body>

</html>