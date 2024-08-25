<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label, button{
            display:block;
            margin-top:5px;
        }
    </style>
</head>
<body>
    <form action="loginMethod.php" method="POST">
    <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Gonder</button>
    </form>
</body>
</html>