<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
</head>
<body>
    <h2>Insert New User</h2>
    <form action="process.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="submit" name="insert" value="Insert User">
    </form>

    <h2>View All Users</h2>
    <form action="process.php" method="POST">
        <input type="submit" name="view_all" value="View All Users">
    </form>
</body>
</html>