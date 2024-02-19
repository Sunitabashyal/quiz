<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a form with fields for name and score
    $name = $_POST["name"];
    $score = $_POST["score"];

    // Certificate template
    $certificate = "
        <html>
        <head>
            <title>Quiz Certificate</title>
        </head>
        <body>
            <h1>Certificate of Achievement</h1>
            <p>This is to certify that</p>
            <h2>$name</h2>
            <p>has successfully completed the quiz with a score of $score.</p>
            <p>Congratulations!</p>
        </body>
        </html>
    ";

    // Set content type to HTML
    header('Content-Type: text/html');

    // Output the certificate
    echo $certificate;

    // Optionally, you can save the certificate as a file
    // file_put_contents("certificates/$name_certificate.html", $certificate);
    // Note: Ensure that the "certificates" directory exists and is writable.
} else {
    // Display the form if it's a GET request
    echo "
        <html>
        <head>
            <title>Quiz Certificate Generator</title>
        </head>
        <body>
            <h1>Quiz Certificate Generator</h1>
            <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                <label for='name'>Name:</label>
                <input type='text' name='name' required><br>
                <label for='score'>Quiz Score:</label>
                <input type='text' name='score' required><br>
                <input type='submit' value='Generate Certificate'>
            </form>
        </body>
        </html>
    ";
}

?>