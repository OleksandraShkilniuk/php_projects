<?php
session_start();

if(!empty($_SESSION['is_auth'])){
    header('Location: /index.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['email'] === 'some@gmail.com' && $_POST['password'] === '123456') {
        $_SESSION['is_auth'] = true;
        header('Location: /');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>
<body>
<div class="container">

    <form action="/authorization.php" method="POST" class="row g-3 m-3">

        <div class="col-6">
            <label class="form-label" for="email">Email:</label>
            <input id="email" type="email" name="email"
                   value=""
                   class="form-control"
                   required>
        </div>

        <div class="col-6">
            <label class="form-label" for="password">Password:</label>
            <input id="password" type="password" name="password" value=""
                   class="form-control"
                   required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary m-3" style="width: 100px;">Submit</button>

        </div>

        <form method="GET">
            <button class="col-6 btn btn-info mx-3" type="submit" name="theme" value="light" style="width: 100px;">Light</button>
            <button class="col-6 btn btn-info" type="submit" name="theme" value="dark" style="width: 100px;">Dark</button>
        </form>

    </form>
</div>

</body>
</html>
