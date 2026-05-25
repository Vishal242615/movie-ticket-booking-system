<?php
$conn = mysqli_connect("localhost", "root", "", "movie_booking_db", 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>