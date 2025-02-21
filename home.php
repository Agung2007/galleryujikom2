<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <style>
        /* Styling dasar */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #2E3192, #1BFFFF);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}

h1 {
    text-align: center;
    color: white;
    margin-bottom: 20px;
    font-size: 32px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

/* Container styling */
.container {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    width: 500px;
    text-align: center;
    animation: fadeIn 1s ease-in-out;
}

p {
    font-size: 18px;
    color: #333;
    margin-bottom: 20px;
}

/* Navigation */
ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    gap: 15px;
}

li {
    display: inline;
}

a {
    text-decoration: none;
    background: linear-gradient(to right, #2E3192, #1BFFFF);
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
    transition: 0.3s;
    font-weight: bold;
}

a:hover {
    background: linear-gradient(to right, #1BFFFF, #2E3192);
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(27, 255, 255, 0.3);
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>
<body>
    <h1>Halaman Home</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>