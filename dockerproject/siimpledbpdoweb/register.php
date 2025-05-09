<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO students (name, grade) VALUES (:name, :grade)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['name' => $name, 'grade' => $grade]);
        $message = "Student registered successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h2>Register New Student</h2>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <form method="POST" action="register.php">
        <label>Full Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Grade:</label><br>
        <input type="text" name="grade" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
