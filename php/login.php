<?php 
    $isLoggedIn = false;

    if (isset($_POST['login']) && $_POST['username'] !== null && $_POST['password'] !== null) {
        $query = "SELECT * FROM accounts;";
        $resultset = $conn->query($query);

        while ($result = $resultset->fetch()) {
            if ($result['username'] == $_POST['username'] && $result['password'] == $_POST['password']) {
                $isLoggedIn = true;
                $loginID = $result['id'];
            }
            if ($isLoggedIn == false) {
                echo "bad login";
            }
        }
    }
?>