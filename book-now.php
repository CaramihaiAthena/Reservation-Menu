<?php
session_start();
require 'dbCon.php';

$id = $email = $number_persons = $book_day = $book_time = "";
$_SESSION['message'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number_persons = test_input($_POST["number_persons"]);
    $email = test_input($_POST["email"]);
    $book_day = test_input($_POST["book_day"]);
    $book_time = test_input($_POST["book_time"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    if ($email == "" || $number_persons == "" || $book_day == "") {
        $_SESSION['message'] =  "You have to enter details!";
        header("Location: reserve.php");
        exit();
    } elseif(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $_SESSION['message'] = "Invalid email address";
        header("Location: reserve.php");
        exit();
    }
     else {
        $query = $conn->prepare("SELECT * FROM Reservation.book WHERE email=:email");
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0) {
            $_SESSION['message'] =  "The email address is already registered";
            header("Location: reserve.php");
            exit();
        } 
        else {
            $stmt = $conn->prepare("INSERT INTO Reservation.book (email,number_persons,book_day,book_time) VALUES (:email,:number_persons,:book_day,:book_time)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':number_persons', $number_persons);
            $stmt->bindParam(':book_day', $book_day);
            $stmt->bindParam(':book_time', $book_time);
            $stmt->execute();

            foreach ($result as $value) {
                $_SESSION['id'] = $value['id'];
                $_SESSION['user'] = $email;
            }

            $_SESSION['message'] =  "You successfully booked a table!";
            header("Location: reserve.php");
            exit();
        }
    }
} catch (PDOException $e) {
    $error = "Error: " . $e->getMessage();
    echo $error;
}
?>
