<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM movie");
?>

<!DOCTYPE html>
<html>
<head>
<title>Movie Booking System</title>

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

.hero {
    text-align: center;
    padding: 50px 20px;
    color: white;
}

.hero h1 {
    font-size: 45px;
    margin-bottom: 10px;
}

.hero p {
    font-size: 18px;
    color: #dbeafe;
}

.container {
    width: 90%;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 25px;
    padding-bottom: 50px;
}

.movie {
    background: white;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(0,0,0,0.35);
    transition: 0.3s;
}

.movie:hover {
    transform: translateY(-8px);
}

.movie img {
    width: 100%;
    height: 360px;
    object-fit: cover;
}

.movie-content {
    padding: 20px;
}

.movie h3 {
    color: #1e3a8a;
    font-size: 25px;
    margin-top: 0;
}

.movie p {
    color: #444;
    font-size: 15px;
}

button {
    width: 100%;
    padding: 12px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
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

<div class="hero">
    <h1>Movie Ticket Booking System</h1>
    <p>Book your favourite movie tickets easily and quickly</p>
</div>

<div class="container">
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="movie">
        <img src="<?php echo $row['image_url']; ?>" alt="Movie Image">

        <div class="movie-content">
            <h3><?php echo $row['title']; ?></h3>
            <p><b>Genre:</b> <?php echo $row['genre']; ?></p>
            <p><b>Duration:</b> <?php echo $row['duration']; ?> minutes</p>
            <p><b>Language:</b> <?php echo $row['language']; ?></p>

            <a href="book.php?movie_id=<?php echo $row['movie_id']; ?>">
                <button>Book Ticket</button>
            </a>
        </div>
    </div>
<?php } ?>
</div>

</body>
</html>