<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Edit Menu</title>
    <link rel="stylesheet" href="css/main.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
    <script src="js/main.js"></script>
    <?php 
        require_once("php/config.php");
        require_once('php/login.php');
        $title = "<a href='dashboard.php'>Dashboard</a> <span class='crumb'>|Edit Menu|</span>";
        require_once('php/nav.php');
    ?>
    
    <div id="sidebar">
        <?php 
            

            if(isset($_POST['delete'])) {
                $delete_prepare = $conn->prepare("DELETE FROM menu where id = ?;");
                $delete_prepare->execute([$_POST['id']]);
            }

            if(isset($_POST['add-item'])) {
                $conn->query("INSERT INTO menu(title,description,price,vegan) VALUES('[EMPTY]','',0,0);");
            }

            if(isset($_POST['submit'])) {
                $vegan_numb = 0;
                if (isset($_POST['vegan'])) {
                    $vegan_numb = 1;
                }
                $update_prepare = $conn->prepare("UPDATE menu SET title = ?, description = ?, price = ?, vegan = ? WHERE id = ?;");
                $update_prepare->execute([$_POST['title'], $_POST['description'], $_POST['price'], $vegan_numb, $_POST['id']]);
            };

            $resultSet = $conn->query("SELECT * FROM menu ORDER BY title != '[EMPTY]', title");

            $i = 0;
            while ($result = $resultSet->fetch()) {
                $i++;
                echo "<admin-item id='id-".$result['id']."' 
                data-title=\"".$result['title']."\" 
                data-description=\"".$result['description']."\" 
                data-price=\"".$result['price']."\" 
                data-vegan=\"".$result['vegan']."\"
                onclick='select(this.id)' class='item'>".$result['title']."</admin-item>";
            }  
        ?>
    </div>
    <form class="back-form" method="post">
        <h2>Select item</h2>
        <h3>or</h3>
        <input type="submit" action="" name="add-item" id="add-item-btn" value="add item"></input>
    </form>
        
    <form action="" method="post" id="edit">
        <a href="edit-menu.php" id="close-form"><h3>X</h3></a>
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
<script src="js/classes.js"></script>
</html>