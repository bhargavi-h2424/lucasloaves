<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if files are uploaded
    if (isset($_FILES['coverLetter']) && isset($_FILES['resume'])) {
        // Placeholder for file handling logic
        echo "Application submitted successfully!";
        echo "<br>Name: " . $name;
        echo "<br>Email: " . $email;
    } else {
        echo "Please attach both cover letter and resume.";
    }
} else {
    echo "Invalid form submission.";
}
?>