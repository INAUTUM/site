<?php
$servername = "std-mysql.ist.mospolytech.ru"; // адрес сервера
$username = "std_2319_site"; // имя пользователя
$password = "23289192"; // пароль
$dbname = "std_2319"; // имя базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из формы
$title = $_POST['title'];
$description = $_POST['description'];

// Подготовка SQL-запроса для вставки данных
$stmt = $conn->prepare("INSERT INTO plants (title, description) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $description);

if ($stmt->execute()) {
    echo "Новая запись успешно добавлена";
} else {
    echo "Ошибка: " . $stmt->error;
}

// Закрытие соединения
$stmt->close();
$conn->close();
?>
