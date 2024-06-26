<?php
function validate_input($pattern, $input) {
    return preg_match($pattern, $input);
}

$website_pattern = '/^(https?:\/\/)?(www\.)?([a-zA-Z0-9]+(-?[a-zA-Z0-9])*\.)+[a-zA-Z]{2,}(\:[0-9]+)?(\/($|[a-zA-Z0-9.,?\'\\+&%$#=~_-]+))*$/';
$name_pattern = '/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/';
$email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$phone_pattern = '/^(?:\+?88)?01[3-9]\d{8}$/';
$address_pattern = '/^(\d{1,4}\/\d{1,4}),\s*([\w\s-]+),\s*([\w\s-]+),\s*(\w+)(?:\s*-\s*(\d{4}))?$/';

$website = $_POST['website'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$errors = [];

if (!validate_input($website_pattern, $website)) {
    $errors[] = "Invalid website URL.";
}

if (!validate_input($name_pattern, $name)) {
    $errors[] = "Invalid name format.";
}

if (!validate_input($email_pattern, $email)) {
    $errors[] = "Invalid email address.";
}

if (!validate_input($phone_pattern, $phone)) {
    $errors[] = "Invalid phone number.";
}

if (!validate_input($address_pattern, $address)) {
    $errors[] = "Invalid address format.";
}

if (!empty($errors)) {
    echo "<body style='background: url(\"1.jpg\") no-repeat center center fixed; background-size: cover;'>";
    echo "<div style='background-color: rgba(255, 255, 255,0.1); padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); margin: 50px auto; max-width: 600px;'>";
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    echo "<a href='index.php'>Go back to the form</a>";
    echo "</div>";
    echo "</body>";
} else {
    echo "<body style='background: url(\"1.jpg\") no-repeat center center fixed; background-size: cover;'>";
    echo "<div style='background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); margin: 50px auto; max-width: 600px;'>";
    echo "<h1>Submitted Information</h1>";
    echo "<p><strong>Website:</strong> $website</p>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "</div>";
    echo "</body>";
}
?>
