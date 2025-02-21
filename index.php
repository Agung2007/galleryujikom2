<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <style>
        /* Styling dasar */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
    margin-top: 20px;
}

/* Navigasi */
ul {
    list-style: none;
    padding: 0;
    text-align: center;
}

ul li {
    display: inline;
    margin: 0 10px;
}

ul li a {
    text-decoration: none;
    padding: 10px 15px;
    background: #007bff;
    color: #fff;
    border-radius: 5px;
    transition: 0.3s;
}

ul li a:hover {
    background: #0056b3;
}

/* Tabel */
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}

/* Gaya untuk gambar */
td img {
    border-radius: 5px;
    transition: transform 0.3s;
}

td img:hover {
    transform: scale(1.1);
}

/* Aksi tombol */
td a {
    text-decoration: none;
    padding: 5px 10px;
    margin: 5px;
    background: #28a745;
    color: white;
    border-radius: 5px;
    transition: 0.3s;
}

td a:hover {
    background: #218838;
}

/* Responsif */
@media (max-width: 768px) {
    table {
        width: 100%;
    }

    ul li {
        display: block;
        margin: 5px 0;
    }
}

    </style>
</head>
<body>
    <h1>Halaman Landing</h1>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
    <?php
        }else{
    ?>   
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    <?php
        }
    ?>
    

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
                <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="like.php?fotoid=<?=$data['fotoid']?>">Like</a>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>">Komentar</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    
</body>
</html>