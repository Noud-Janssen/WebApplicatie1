<?php 

    //logging out
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
    }

    //logging in
    if (isset($_POST['login']) && $_POST['username'] !== "" && $_POST['password'] !== "") {
        $resultset = $conn->prepare("SELECT * FROM accounts WHERE username = ? ");
        $resultset->execute([$_POST['username']]);
        $loginCheck = false;
        if ($result = $resultset->fetch()) {
            if ($result['password'] == $_POST['password']) {
                $_SESSION['userID'] = $result['id'];
                $loginCheck = true;
            }
        }

        if (!$loginCheck) {
            echo "<script>
                alert('Verkeerde inlog');
            </script>";
        }  
    }
    
?>