<?php
    session_start();
    include("sambungan.php");
    
    $error = '';
    
    if (isset($_POST["submit"])) {
        $userid = mysqli_real_escape_string($sambungan, $_POST["userid"]);
        $password = mysqli_real_escape_string($sambungan, $_POST["password"]);
        
        $jumpa = FALSE;
        
        // Check pelanggan table
        $sql = "SELECT * FROM pelanggan WHERE no_telefon = '$userid' AND password = '$password'";
        $result = mysqli_query($sambungan, $sql);
        
        if ($pelanggan = mysqli_fetch_array($result)) {
            $jumpa = TRUE;
            $_SESSION["idpengguna"] = $pelanggan["no_telefon"];
            $_SESSION["nama"] = $pelanggan["nama_pelanggan"];
            $_SESSION["status"] = "pelanggan";
        }
        
        // Check pekerja table if not found in pelanggan
        if (!$jumpa) {
            $sql = "SELECT * FROM pekerja WHERE id_pekerja = '$userid' AND password = '$password'";
            $result = mysqli_query($sambungan, $sql);
            
            if ($pekerja = mysqli_fetch_array($result)) {
                $jumpa = TRUE;
                $_SESSION["idpengguna"] = $pekerja["id_pekerja"];
                $_SESSION["nama"] = $pekerja["nama_pekerja"];
                $_SESSION["status"] = "pekerja";
            }
        }
        
        if ($jumpa) {
            if ($_SESSION["status"] == "pelanggan") {
                header("Location: index.php");
                exit();
            } else if ($_SESSION["status"] == "pekerja") {
                header("Location: pekerja_menu.php");
                exit();
            }
        } else {
            $error = "ID pengguna atau kata laluan salah!";
        }
    }
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <div class="auth-container">
        <h3 class="auth-title">LOG MASUK</h3>
        
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form class="auth-form" action="login.php" method="post">
            <div class="form-group">
                <img src="imej/user.png" alt="User">
                <input type="text" name="userid" class="form-input" 
                       placeholder="ID Pengguna (No. Telefon/Pekerja)" 
                       required>
            </div>
            
            <div class="form-group">
                <img src="imej/lock.png" alt="Password">
                <input type="password" name="password" class="form-input" 
                       placeholder="Kata Laluan" 
                       maxlength="16"
                       required>
            </div>
            
            <button type="submit" name="submit" class="auth-button login-button">Log Masuk</button>
        </form>
        
        <div class="auth-links">
            <p>Tiada akaun? <a href="signup.php">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>
