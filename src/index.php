<?php
session_start();

if(empty($_SESSION['is_auth'])){
    header('Location: /authorization.php');
    exit();
}

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>
<body>

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
</body>
</html>

