<?php
session_start();

if(empty($_SESSION['is_auth'])){
    header('Location: /authorization.php');
    exit();
}

//check if the button was clicked by checking if there is a value named mode
if(isset($_POST['mode'])){
    //sets the variable to a boolean type
    $mode = $_POST['mode'] == 'darkMode'? 1:0;
    //sets cookie to store the info for 30 days
    setcookie('currentMode', $mode, time() + (86400 * 30), "/");

    //refreshes the page for the changes to come into force
    header('Location: /index.php');
    //stops further script
    exit();
}

$currentMode = isset($_COOKIE['currentMode']) && $_COOKIE['currentMode'] == '1'? 'dark': 'light';

if(isset($_COOKIE)) {
    var_dump($_COOKIE);
}

?>

<!DOCTYPE html>

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

<h1>NOT PUBLIC INFO</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fermentum nibh id malesuada ultricies.
    Vivamus eget leo vel sapien interdum malesuada. Nullam suscipit orci vel fermentum finibus.
    Duis tincidunt convallis odio, vel fermentum enim. Donec luctus consequat felis, non mattis purus vestibulum id.
    Sed consectetur auctor diam, id fermentum odio volutpat vel. Phasellus viverra massa sit amet tellus faucibus,
    at bibendum urna convallis. Ut vitae nisl leo. Sed eget erat ac libero pharetra aliquam eu in lorem. Sed commodo,
    lorem sit amet rutrum fermentum, dolor sem viverra arcu, a vestibulum odio risus a nisl.
    Vivamus condimentum vitae nisi nec condimentum. Quisque commodo gravida odio, auctor rhoncus urna fermentum sed.
    Sed id ex consequat, fringilla elit vel, sodales libero. Maecenas posuere fermentum fermentum.
    Sed euismod justo vitae pharetra fermentum.

    Pellentesque ac vestibulum ipsum. Quisque ultrices aliquam est, non hendrerit sem vehicula ac.
    Phasellus nec tortor in risus gravida aliquet sed in purus. Aliquam nec ante vitae enim fringilla posuere nec ac nulla.
    Integer et leo id risus varius fermentum. Ut quis orci auctor, sollicitudin justo sed, aliquam lectus.
    Nulla interdum purus et ex ultrices dignissim. Sed bibendum risus a nunc interdum, eget tempus velit placerat.
    Donec vestibulum aliquam mauris, sit amet tincidunt neque laoreet ut. Cras vitae tristique mauris, in molestie felis.
    Integer vehicula lectus ac turpis auctor, sed tincidunt justo ullamcorper. Donec ornare, velit eget vestibulum auctor,
    lorem risus consectetur lectus, nec commodo urna purus ac odio. Integer rhoncus vehicula nulla non laoreet. Suspendisse potenti.
    Etiam maximus dapibus nulla, vel luctus ex consectetur eu. Sed pharetra, nulla vel mattis hendrerit, orci neque consequat ex, nec
    rhoncus libero nunc ac eros.

</p>

<form action="index.php" method="POST">
    <button type="submit" class="btn btn-light btn-outline-dark m-3" name="mode"
            style="width: 100px;" value="lightMode">Light Mode</button>
    <button type="submit" class="btn btn-dark btn-outline-dark text-white m-3" name="mode"
            style="width: 100px;" value="darkMode">Dark Mode</button>
</form>


</body>
</html>

