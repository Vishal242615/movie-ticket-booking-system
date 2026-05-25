<?php
include "db.php";

$movie_id = $_GET['movie_id'];

$movie_result = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id = $movie_id");
$movie = mysqli_fetch_assoc($movie_result);

$theatres = mysqli_query($conn, "SELECT * FROM theatre");

if (isset($_POST['book'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $seats = $_POST['seats'];
    $theatre_id = $_POST['theatre_id'];
    $payment_method = $_POST['payment_method'];

    $ticket_price = 250;
    $total_amount = $seats * $ticket_price;
    $payment_status = "SUCCESS";

    $query = "INSERT INTO booking(name, email, phone, seats, movie_id, theatre_id, booking_date, payment_method, payment_status, total_amount)
              VALUES('$name', '$email', '$phone', '$seats', '$movie_id', '$theatre_id', CURDATE(), '$payment_method', '$payment_status', '$total_amount')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Ticket booked successfully'); window.location='bookings.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Ticket</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #0f172a, #1e3a8a);
}

.navbar {
    background: rgba(0,0,0,0.75);
    padding: 18px 50px;
    display: flex;
    justify-content: space-between;
}

.logo {
    color: white;
    font-size: 24px;
    font-weight: bold;
}

.navbar a {
    color: white;
    text-decoration: none;
    margin-left: 25px;
    font-weight: bold;
}

.wrapper {
    width: 85%;
    margin: 60px auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 35px;
}

.movie-box, .form-box {
    background: white;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.35);
}

.movie-box img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    border-radius: 15px;
}

h1 {
    color: #1e3a8a;
}

input, select {
    width: 100%;
    padding: 13px;
    margin: 8px 0 18px;
    border-radius: 10px;
    border: 1px solid #ccc;
    font-size: 15px;
}

button {
    width: 100%;
    padding: 14px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 17px;
    cursor: pointer;
}

button:hover {
    background: #1d4ed8;
}
</style>
</head>

<body>

<div class="navbar">
    <div class="logo">🎬 MovieBook</div>
    <div>
        <a href="index.php">Home</a>
        <a href="bookings.php">Bookings</a>
    </div>
</div>

<div class="wrapper">

    <div class="movie-box">
        <img src="<?php echo $movie['image_url']; ?>">
        <h1><?php echo $movie['title']; ?></h1>
        <p><b>Genre:</b> <?php echo $movie['genre']; ?></p>
        <p><b>Language:</b> <?php echo $movie['language']; ?></p>
        <p><b>Duration:</b> <?php echo $movie['duration']; ?> minutes</p>
        <p><b>Ticket Price:</b> ₹250 per seat</p>
    </div>

    <div class="form-box">
        <h1>Book Ticket</h1>

        <form method="POST">
            Name:
            <input type="text" name="name" required>

            Email:
            <input type="email" name="email" required>

            Phone:
            <input type="text" name="phone" required>

            Theatre:
            <select name="theatre_id" required>
                <?php while ($t = mysqli_fetch_assoc($theatres)) { ?>
                    <option value="<?php echo $t['theatre_id']; ?>">
                        <?php echo $t['theatre_name'] . " - " . $t['location']; ?>
                    </option>
                <?php } ?>
            </select>

            Seats:
            <input type="number" name="seats" min="1" required>

            Payment Method:
            <select name="payment_method" required>
                <option value="UPI">UPI</option>
                <option value="Card">Card</option>
                <option value="Cash">Cash</option>
            </select>

            <button type="submit" name="book">Confirm Booking</button>
        </form>
    </div>

</div>

</body>
</html>