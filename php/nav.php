<?php
echo "<nav>
        <h2>".$title."</h2>
        <div id='landscape' class='link-wrapper'>
            <a href='index.php'>Home</a>
            <a href='menu.php'>Menu</a>
            <a href='reserveren.php'>Reserveren</a>
            <a href='contact.php'>Contact</a>";
            if (isset($_SESSION['userID'])) {
                echo "<a href='dashboard.php'>Dashboard</a>
                <form method='post'id='logout'>
                    <input type='submit' name='logout' value='logout'>
                </form>
                    ";
            } else {
                echo "<button onclick='toggleLogin()' class='login-button'>Login</button>";
            }
echo "
        </div>
    </nav>
    <nav id='mobile'>
        <div class='link-wrapper'>
            <a href='index.php'>
                <?php 
                    echo file_get_contents('assets/icons/home.svg')
                ?>
            </a>
            <a href='menu.php'>
                <?php 
                    echo file_get_contents('assets/icons/menu.svg')
                ?>
            </a>
            <a href='contact.php'>
                <?php 
                    echo file_get_contents('assets/icons/contact.svg')
                ?>
            </a>";
    if ($_SESSION['userID'] != 0) {
        echo "<a href='dashboard.php'>
            <?php 
                echo file_get_contents('assets/icons/dashboard.svg')
            ?>
            </a>
            <input type='submit' name='logout' value='logout'>
            ";
    } else {
        echo "<button onclick='toggleLogin()' class='login-button'>
            <?php 
                echo file_get_contents('assets/icons/login.svg')
            ?>
            </button>";
    }
    echo "  
        </div>
    </nav>
    <div id='login' class='n-v'>
        <form method='post' action=''>
            <h4>Username</h4>
            <input type='text' name='username' id=''>
            <h4>Password</h4>
            <input type='password' name='password' id=''>
            <br>
            <br>
            <input type='submit' name='login' value='Login'>
        </form>
    </div>" 
?>