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
    <form action="file.php" method="POST" enctype='multipart/form-data'>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="file">Check file</label>
        <input type="file" name="file[]" id="file" multiple>

        <button>Add file</button>
    </form>
</body>
</html>