<?php
$servername = "localhost";
$username = "root"; // Измените при необходимости
$password = ""; // Ваш пароль к базе данных
$dbname = "unified_window";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка заявки на справку
    if (isset($_POST['certificateType'])) {
        $full_name = $_POST['fullName'] ?? '';
        $dob = $_POST['dob'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $certificate_type = $_POST['certificateType'] ?? '';
        $comments = $_POST['comments'] ?? '';

        $sql = "INSERT INTO certificates (full_name, dob, phone, email, certificate_type, comments) 
                VALUES ('$full_name', '$dob', '$phone', '$email', '$certificate_type', '$comments')";
    
    // Обработка заявки на диплом
    } elseif (isset($_POST['diplomaSerial'])) {
        $full_name = $_POST['fullNameDiploma'] ?? '';
        $dob = $_POST['dobDiploma'] ?? '';
        $phone = $_POST['phoneDiploma'] ?? '';
        $email = $_POST['emailDiploma'] ?? '';
        $diploma_serial = $_POST['diplomaSerial'] ?? '';
        $institution = $_POST['institution'] ?? '';
        $year = $_POST['year'] ?? '';
        $comments = $_POST['commentsDiploma'] ?? '';

        $sql = "INSERT INTO diplomas (full_name, dob, phone, email, diploma_serial, institution, year, comments) 
                VALUES ('$full_name', '$dob', '$phone', '$email', '$diploma_serial', '$institution', '$year', '$comments')";

    // Обработка заявки на обходные листовки
    } elseif (isset($_POST['purpose'])) {
        $full_name = $_POST['fullNamePass'] ?? '';
        $dob = $_POST['dobPass'] ?? '';
        $phone = $_POST['phonePass'] ?? '';
        $email = $_POST['emailPass'] ?? '';
        $purpose = $_POST['purpose'] ?? '';
        $comments = $_POST['commentsPass'] ?? '';

        $sql = "INSERT INTO passes (full_name, dob, phone, email, purpose, comments) 
                VALUES ('$full_name', '$dob', '$phone', '$email', '$purpose', '$comments')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Новая запись успешно добавлена";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
