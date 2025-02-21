<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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

/* Form styling */
form {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    width: 400px;
    text-align: left;
    animation: fadeIn 1s ease-in-out;
}

table {
    width: 100%;
}

tr td:first-child {
    font-weight: bold;
    padding: 10px;
    color: #555;
}

input[type="text"],
input[type="password"],
input[type="email"] {
    width: 100%;
    padding: 14px;
    margin: 8px 0;
    border: 2px solid #ddd;
    border-radius: 10px;
    box-sizing: border-box;
    transition: 0.3s;
    font-size: 16px;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus {
    border-color: #1BFFFF;
    outline: none;
    box-shadow: 0 0 10px rgba(27, 255, 255, 0.5);
}

input[type="submit"] {
    width: 100%;
    background: linear-gradient(to right, #2E3192, #1BFFFF);
    color: white;
    padding: 14px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

input[type="submit"]:hover {
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
    <h1>Halaman Registrasi</h1>
    <form action="proses_register.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="namalengkap"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html>