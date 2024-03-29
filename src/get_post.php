<?php

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    echo('IS GET');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo('IS POST');

    $username = isset($_POST['username'])? $_POST['username']: '';
    $email = isset($_POST['email'])? $_POST['email']: '';
    $password = isset($_POST['password'])? $_POST['password']: '';
    $country = isset($_POST['country'])? $_POST['country']: '';
    $gender = isset($_POST['gender'])? $_POST['gender']: '';
    $agreement = isset($_POST['agreement'])? $_POST['agreement']: '';


//Validation

    if (trim($username) === '') {
        $errors['usernameError'] = 'Username is required';
    } elseif (mb_strlen($username) > 255) {
        $errors['usernameError'] = 'Username length is bigger than 255';
    } elseif (mb_strlen($username) < 3) {
        $errors['usernameError'] = 'Username length is less than 3';
    }

    if(trim($email) === ''){
        $errors['emailError'] = 'Email is required';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'Please enter a valid email';
    } elseif (mb_strlen($email) < 3) {
        $errors['emailError'] = 'Email length is less than 3';
    } elseif (mb_strlen($email) > 255) {
        $errors['emailError'] = 'Email length is bigger than 255';
    }
    if (trim($password) === ''){
        $errors['passwordError'] = 'Password is required';
    }elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+/', $password)) {
        $errors['passwordError'] = 'Password should contain digits and letters';
    }

    if (!isset($_POST['agreement'])) {
        $errors['agreementError'] = 'You must agree to the Terms of use';
    }

};

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

    <form action="get_post.php" method="POST" class="row g-3 m-3">

        <div class="col-6">
            <label class="form-label" for="username">User name:</label>
            <input id="username" type="text" name="username"
                   value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                   class="form-control <?php echo isset($errors['usernameError']) ? 'is-invalid' : ''; ?>"
                   required>
            <div class="invalid-feedback">
                <?= $errors['usernameError'] ?>
            </div>
        </div>

        <div class="col-6">
            <label class="form-label" for="email">Email:</label>
            <input id="email" type="email" name="email"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                   class="form-control <?php echo isset($errors['emailError']) ? 'is-invalid' : ''; ?>"
                   required>
            <div class="invalid-feedback">
                <?= $errors['emailError'] ?>
            </div>
        </div>

        <div class="col-6">
            <label class="form-label" for="password">Password:</label>
            <input id="password" type="password" name="password" value=""
                   class="form-control <?php echo isset($errors['passwordError']) ? 'is-invalid' : ''; ?>"
                   required>
            <div class="invalid-feedback">
                <?= $errors['passwordError'] ?>
            </div>
        </div>

        <div class="col-6">
            <label for="country" class="form-label">Country:</label>
            <select class="form-select" id="country" name="country">
                <option value="">-</option>
                <option value="albania" <?php echo isset($country) && $country === 'albania' ? 'selected' : ''; ?>>
                    Albania
                </option>
                <option value="germany" <?php echo isset($country) && $country === 'germany' ? 'selected' : ''; ?>>
                    Germany
                </option>
                <option value="ukraine" <?php echo isset($country) && $country === 'ukraine' ? 'selected' : ''; ?>>
                    Ukraine
                </option>
                <option value="nepal" <?php echo isset($country) && $country === 'nepal' ? 'selected' : ''; ?>>Nepal
                </option>
            </select>
        </div>

        <div>
            <label for="genderMale">Male:</label>
            <input class="form-check-input" id="genderMale" type="radio" value="male" name="gender"
                <?php echo isset($gender) && $gender === 'male' ? 'checked' : ''; ?>>
            <label for="genderFemale">Female:</label>
            <input class="form-check-input" id="genderFemale" type="radio" value="female" name="gender"
                <?php echo isset($gender) && $gender === 'female' ? 'checked' : ''; ?>>
        </div>

        <div>
            <label for="terms1">Do you agree to the Terms of Use:</label>
            <input id="terms1" type="checkbox" value="yes" name="agreement"
                   class="form-check-input <?php echo isset($errors['agreementError']) ? 'is-invalid' : ''; ?>"
                <?php echo isset($agreement) && $agreement === 'yes'? 'checked': '';?>
            >
            <div class="invalid-feedback">
                <?= $errors['agreementError'] ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary m-3" style="width: 100px;">Submit</button>

    </form>
</div>

</body>
</html>