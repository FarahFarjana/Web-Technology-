<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $course = $_POST["course"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $batch = $_POST["batch"];
    if (!file_exists('uploads')) {
        mkdir('uploads');
    }

    // Handle the uploaded photo
    $photo = $_FILES["photo"];
    $photoPath = "uploads/" . $photo["name"];
    move_uploaded_file($photo["tmp_name"], $photoPath);

    // Display the ID card information
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>ID Card</title>";
    echo "<link rel='stylesheet' type='text/css' href='id_card_style.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div id='id-card'>";
    echo "<img src='$photoPath' alt='Photo'>";
    echo "<div class='info'>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Course:</strong> $course</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Batch No:</strong> $batch</p>";
    echo "</div>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}
?>
