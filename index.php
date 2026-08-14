<?php
require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);

    if ($name === "" || $age === false || $age === null || $age < 1 || $age > 120) {
        $message = "Please enter a valid name and age.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, age, status) VALUES (?, ?, 0)");
        $stmt->bind_param("si", $name, $age);

        if ($stmt->execute()) {
            $message = "Record added successfully.";
        } else {
            $message = "Error adding record.";
        }
        $stmt->close();
    }
}

$result = $conn->query("SELECT id, name, age, status FROM users ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Database</h1>

        <form method="POST" class="user-form">
            <input type="text" name="name" placeholder="Name" required maxlength="100">
            <input type="number" name="age" placeholder="Age" min="1" max="120" required>
            <button type="submit">Submit</button>
        </form>

        <?php if ($message !== ""): ?>
            <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr id="row-<?= (int)$row["id"] ?>">
                    <td><?= (int)$row["id"] ?></td>
                    <td><?= htmlspecialchars($row["name"]) ?></td>
                    <td><?= (int)$row["age"] ?></td>
                    <td class="status"><?= (int)$row["status"] ?></td>
                    <td>
                        <button class="toggle-btn"
                                data-id="<?= (int)$row["id"] ?>"
                                type="button">
                            Toggle
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>
<?php $conn->close(); ?>
