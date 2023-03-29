<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Edit Accounts</title>
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
        $title = "<a href='dashboard.php'>Dashboard</a> <span class='crumb'>|Edit Accounts|</span>";
        require_once('php/nav.php');
    ?>
    
    <div id="sidebar">
        <?php 
            

            if(isset($_POST['delete'])) {
                $conn->query("DELETE FROM accounts where id = ".$_POST['id'].";");
            }

            if(isset($_POST['add-account'])) {
                $conn->query("INSERT INTO accounts(username,password) VALUES('[EMPTY]','[EMPTY]');");
            }

            if(isset($_POST['submit'])) {
                $conn->query("UPDATE accounts
                SET username = '".$_POST['username']."', password = '".$_POST['password']."' WHERE id = ".$_POST['id'].";");
            };

            $resultSet = $conn->query("SELECT * FROM accounts ORDER BY username != '[EMPTY]', username");

            $i = 0;
            while ($result = $resultSet->fetch()) {
                $i++;
                echo "<admin-item-account id='id-".$result['id']."' 
                data-name=\"".$result['username']."\" 
                data-password=\"".$result['password']."\" 
                onclick='select_account(this.id)' class='item account'>".$result['username']."</admin-item-account>";
            }  
        ?>
    </div>
    <form class="back-form" method="post">
        <h2>Select Account</h2>
        <h3>or</h3>
        <input type="submit" name="add-account" id="add-item-btn" value="add account"></input>
    </form>
        
    <form action="" method="post" id="edit">
        <a href="edit-accounts.php" id="close-form"><h3>X</h3></a>
        <div class="input-box">
            <h2>Username:</h2>
            <input type="text" name="username" id="name-of-pizza" value="">
        </div>
        <div class="input-box">
            <h2>Password:</h2>
            <input type="password" name="password" id="description-of-pizza">
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