<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <h1>Welcome to the Main Page</h1>
    <form method="post">
        <button type="submit" name="role" value="admin">Go to Admin Page</button>
        <button type="submit" name="role" value="user">Go to User Page</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $role = $_POST["role"];
        if ($role === "admin") {
            header("Location: admin/index.php");
            exit();
        } elseif ($role === "user") {
            header("Location: user/index.php");
            exit();
        }
    }
    ?>
</body>
</html>
