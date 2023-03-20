<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="get">Reserveren</title>
    <link rel="stylesheet" href="css/main.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,700;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
    <?php 
        require_once("php/config.php");
        require_once('php/login.php');
        $title = "Reserveren";
        require_once('php/nav.php');
    ?>
    <form method="post" id="reservering-form">
        <?php 
            if (isset($_POST['nextStep'])) {
                echo "<input type='hidden' name='step' value='".($_POST['step'] + 1)."'>";
                if ($_POST['step'] == '1') {
                    echo "<div class='input-box'>
                        s<h2>Datum:</h2>
                        <input type='date' name='date' id='' value='".date("Y-m-d")."' required>
                    </div>";
                    echo "<div class='input-box'>
                    <input type='submit' name='nextStep' value='Verder' required>
                    </div>";

                    //submitted info
                    echo "<input type='hidden' name='aantal' value=".$_POST['aantal'].">";
                }  elseif ($_POST['step'] == '2') {
                    echo "<div class='input-box time-wrapper'>
                    <div class='col-50'>
                        <h2>Tijd:</h2>
                    </div>
                    <div class='col-50'>
                    <div class='time-box'>
                        <input type='radio' name'tijd' id='' value='17:00' required='required'>
                        <h4>17:00</h4>
                    </div>
                    <div class='time-box'>
                        <input type='radio' name='tijd' id='' value='17:30'>
                        <h4>17:30</h4>
                    </div>
                    <div class='time-box'>
                        <input type='radio' name='tijd' id='' value='18:00'>
                        <h4>18:00</h4>
                    </div>
                    <div class='time-box'>
                        <input type='radio' name='tijd' id='' value='18:3'>
                        <h4>18:30</h4>
                    </div>
                    <div class='time-box'>
                        <input type='radio' name='tijd' id='' value='19:00'>
                        <h4>19:00</h4>
                    </div>
                    <div class='time-box'>
                        <input type='radio' name='tijd' id='' value='19:30'>
                        <h4>19:30</h4>
                    </div></div>
                    
                </div>";
                echo "<div class='input-box'>
                    <input type='submit' name='nextStep' value='Verder'>
                    </div>";

                //submitted info
                echo "<input type='hidden' name='aantal' value=".$_POST['aantal'].">";
                echo "<input type='hidden' name='date' value='".$_POST['date']."' required>";
                } elseif ($_POST['step'] == '3') {
                    echo "<div class='input-box'>
                    <h2>Naam:</h2>
                    <input type='text' name='naam' id='' required>
                </div>
                <div class='input-box'>
                    <h2>Email:</h2>
                    <input type='email' name='email' id='' required>
                </div>";
                echo "<div class='bevestig input-box'>
                    <input type='submit' name='nextStep' value='Bevestig reservering'>
                    </div>";

                //submitted info
                echo "<input type='hidden' name='aantal' value=".$_POST['aantal'].">";
                echo "<input type='hidden' name='date' value='".$_POST['date']."' required>";
                echo "<input type='hidden' name='tijd' value='".$_POST['tijd']."' required>";
                } elseif ($_POST['step'] >= '4') {

                    $conn->query("");
                    echo "<div class='input-box' id='reservering-message'><h2 id='reservering-message'>Reservering geplaatst.</h2></div>";
                }

            } else {
                echo "<input type='hidden' name='step' value='1'>";
                echo "<div class='input-box'>
                    <h2>Aantal personen:</h2>
                    <input type='number' min='1' max='10' name='aantal' id='' value=1 required>
                </div>";
                echo "<div class='input-box'>
                <input type='submit' name='nextStep' value='Verder'>
                </div>";
            }
        ?>
        
        
        
    </form>
</body>