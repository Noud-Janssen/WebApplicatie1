<?php 
    $isLoggedIn = false;
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
    }
    if (isset($_POST['login']) && $_POST['username'] !== "" && $_POST['password'] !== "") {
        $query = "SELECT * FROM accounts WHERE username = '".$_POST['username']."';";
        $resultset = $conn->query($query);

        if ($result = $resultset->fetch()) {
            if ($result['password'] == $_POST['password']) {
                $_SESSION['userID'] = $result['id'];
            }
        }
        
    }
    
?>