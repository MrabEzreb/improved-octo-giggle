<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corpus1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT hash from users where username = :name");
    $stmt->bindParam(':name', $loginname);
    $loginname = $_POST["username"];
    //echo $loginname;
    $stmt->execute();
    if($stmt->fetchColumn() === $_POST["password"]) {
        echo "Password Correct!";
    }
    $conn = null;
} catch(PDOException $e) {
    echo "Database connection failed, please go back ?>and try again.<br>Debug Info:<br>" . $e->getMessage();
}
?>
