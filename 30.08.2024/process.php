<?php
require_once 'Database.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insert'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $data = [
            'name' => $name,
            'email' => $email
        ];
        if ($db->insert('users', $data)) {
            echo "User inserted successfully.<br>";
        } else {
            echo "Failed to insert user.<br>";
        }
    }

    if (isset($_POST['view_all'])) {
        $users = $db->selectAll('users');
        echo "<h3>All Users:</h3>";
        if (!empty($users)) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <form action='process.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='delete_id' value='<?php echo htmlspecialchars($user['id']); ?>'>
                            <input type='submit' name='delete' value='Delete'>
                        </form>
                    </td>
                </tr>
                <?php
            }
            echo "</table>";
        } else {
            echo "No users found.";
        }
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['delete_id'];
        if ($db->delete('users', 'id = :id', ['id' => $id])) {
            header("location: http://localhost/30.08.2024/index.php");
        } else {
            echo "Failed to delete user.<br>";
        }
    }
}
?>
