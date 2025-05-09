<?php
require 'db.php';

$search = $_GET['search'] ?? '';
$students = [];

if (!empty($search)) {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE name LIKE ? OR grade LIKE ?");
    $term = "%$search%";
    $stmt->execute([$term, $term]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Students</title>
</head>
<body>
    <h2>Search Registered Students</h2>

    <form method="GET" action="students.php">
        <input type="text" name="search" placeholder="Enter name or grade" required>
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($search)): ?>
        <?php if (!empty($students)): ?>
            <table border="1">
                <tr><th>ID</th><th>Name</th><th>Grade</th></tr>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= htmlspecialchars($student['id']) ?></td>
                        <td><?= htmlspecialchars($student['name']) ?></td>
                        <td><?= htmlspecialchars($student['grade']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No results found for "<strong><?= htmlspecialchars($search) ?></strong>".</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
