<!DOCTYPE html> 

<html lang="sk">

<head >

    <meta charset="UTF-8">
    <title> kamen, papier, noznice </title> 

</head>

<body> 

<h2> vyber si tah! </h2>

<form method="POST">
    <button type="submit" name="player_choice" value="kamen"> Kamen </button>
    <button type="submit" name="player_choice" value="papier"> papier</button>
    <button type="submit" name="player_choice" value="noznice"> noznice</button>

</form>

<?php


// pripojenie k db 

$servername = "localhost";
$username = "root";
$password = "heslo";
$dbname = "game_db";

$conn = new mysqli($servername, $username, $password, $dbname);

//skontroluj pripojenie

if ($conn->connect_error) {

    die("Nepodarilo sa spojit s db: ". $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choices = ["kamen", "papier", "noznice"]; 
    $player = $_POST["player_choice"];
    $computer = $choices[array_rand($choices)];


    echo "<h3> Tvoj tah: " . ucfirst($player) . "</h3>";
    echo "<h3> Pocitac: " . ucfirst($computer) . "</h3>";

    if ($player === $computer) {
        echo "<h2> Remiza!</h2>"; 
        $winner = "remiza";

    } elseif (
        ($player === "kamen" && $computer === "noznice") ||
        ($player === "papier" && $computer === "kamen")  ||
        ($player === "noznice" && $computer === "papier")  

    ) {

        echo "<h2> vyhral si </h2>";
        $winner = "clovek";

    } else {
        echo "<h2> prehral si </h2>";
        $winner = "pocitac";
    }

# osetrenie

echo "$winner:" . $winner;

// uloz do db

$winner = mysqli_real_escape_string($conn, $winner);
$sql = "INSERT INTO vysledky (winner) VALUES ('$winner')";
if ($conn->query($sql)=== TRUE) {

    echo "<p> Vysledok bol ulozeny do db. </p>";
} else {
    echo "chyba pri ukladani: " . $conn->error;
    }
    
}

//zatvorenie pripojenia

$conn->close();

?>

</body>

</html>
                 

