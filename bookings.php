<?php
include "db.php";

$result = mysqli_query($conn, "
SELECT b.booking_id, b.name, b.email, b.phone, b.seats, b.booking_date,
       b.payment_method, b.payment_status, b.total_amount,
       m.title, t.theatre_name, t.location
FROM booking b
JOIN movie m ON b.movie_id = m.movie_id
JOIN theatre t ON b.theatre_id = t.theatre_id
ORDER BY b.booking_id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>All Bookings</title>

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
    align-items: center;
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

.container {
    width: 94%;
    margin: 60px auto;
    background: white;
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.35);
}

h1 {
    text-align: center;
    color: #1e3a8a;
    margin-bottom: 25px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #2563eb;
    color: white;
    padding: 13px;
    font-size: 15px;
}

td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 14px;
}

tr:nth-child(even) {
    background: #f3f4f6;
}

tr:hover {
    background: #dbeafe;
}

.back-btn {
    display: inline-block;
    margin-top: 25px;
    background: #2563eb;
    color: white;
    padding: 12px 22px;
    text-decoration: none;
    border-radius: 25px;
    font-weight: bold;
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

<div class="container">
    <h1>All Bookings</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Movie</th>
            <th>Theatre</th>
            <th>Location</th>
            <th>Seats</th>
            <th>Amount</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['booking_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['theatre_name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['seats']; ?></td>
            <td>₹<?php echo $row['total_amount']; ?></td>
            <td><?php echo $row['payment_method']; ?></td>
            <td><?php echo $row['payment_status']; ?></td>
            <td><?php echo $row['booking_date']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <a class="back-btn" href="index.php">Back to Movies</a>
</div>

</body>
</html>