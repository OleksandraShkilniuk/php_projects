<?php
session_start();

if(!empty($_SESSION['is_auth'])){
    header('Location: /adminPage.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['email'] === 'some@gmail.com' && $_POST['password'] === '123456') {
        $_SESSION['is_auth'] = true;
        header('Location: /');
        exit();
    }
}

if(isset($_POST['mode'])){
    $mode = $_POST['mode'] == 'darkMode'? 1: 0;
    setcookie('currentMode', $mode, time() + (86400 * 30), "/");
    header('Location: /authorization.php');
    exit();
}

$currentMode = isset($_COOKIE['currentMode'])&& $_COOKIE['currentMode'] == '1'? 'dark': 'light';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <style>
        /* Light Mode Styles */
        .light {
            background-color: #ffffff;
            color: #000000;
        }

        /* Dark Mode Styles */
        .dark {
            background-color: #222222;
            color: #ffffff;
        }
    </style>
</head>
<body class="<?php echo $currentMode; ?>">
<div class="container">

    <form action="/authorization.php" method="POST" class="row g-3 m-3">

        <div class="col-6">
            <label class="form-label" for="email">Email:</label>
            <input id="email" type="email" name="email"
                   value=""
                   class="form-control">
        </div>

        <div class="col-6">
            <label class="form-label" for="password">Password:</label>
            <input id="password" type="password" name="password" value=""
                   class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-primary m-3" style="width: 100px;">Submit</button>

            <button type="submit" class="btn btn-light btn-outline-dark m-3" name="mode"
                    style="width: 100px;" value="lightMode">Light Mode
            </button>
            <button type="submit" class="btn btn-dark btn-outline-dark text-white m-3" name="mode"
                    style="width: 100px;" value="darkMode">Dark Mode
            </button>

        </div>



    </form>
</div>

</body>
</html>
