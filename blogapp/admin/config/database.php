<?php
require 'constants.php';
// Connect to the database
try {
    // Connect to the database
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
} catch (mysqli_sql_exception $e) {
    // Display a custom error message
    echo "Oops! It seems there was a problem connecting to the database. Please try again later.";
    // Optionally, you can log the error for further investigation
    // error_log($e->getMessage());
    exit; // Exit the script
}
