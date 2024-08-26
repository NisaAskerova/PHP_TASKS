<?php
include "connection.php";

$sql = "SELECT date_id, event_date FROM event_dates";
$selectQuery = $conn->query($sql);
$dates = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT event_name FROM events";
$eventQuery = $conn->prepare($sql);
$eventQuery->execute();
$event = $eventQuery->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedDateId = $_POST['dates'];

    $sql = "INSERT INTO registrations (user_id, date_id)
    SELECT ?, ?
    WHERE (
        SELECT COUNT(*) FROM registrations WHERE date_id = ?
    ) < 3";

    $query = $conn->prepare($sql);
    $result = $query->execute([1, $selectedDateId, $selectedDateId]);

    if ($result && $query->rowCount() > 0) {
        echo "Festivalda ugurlar";
    } else {
        echo "Yerler dolub"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
</head>

<body>
    <form action="" method="post">
        <select name="dates">
            <option value="" disabled selected>Bir tarix seçin</option>
            <?php foreach ($dates as $date): ?>
                <option value="<?= htmlspecialchars($date['date_id']) ?>"><?= htmlspecialchars($date['event_date']) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="event_name" value="<?= htmlspecialchars($event['event_name']) ?>" disabled>
        <br>
        <button type="submit">Send</button>
    </form>
</body>

</html>
