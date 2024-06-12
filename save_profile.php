<?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'profiles_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        $profile_pic = basename($_FILES["profile_pic"]["name"]);
        $sql = "INSERT INTO profiles (name, email, phone, address, profile_pic) VALUES ('$name', '$email', '$phone', '$address', '$profile_pic')";
        if ($conn->query($sql) === TRUE) {
            echo "Profile saved successfully.";
            header("Location: profiles.php");
            exit();
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
