<?php
    session_start();
    include("sambungan.php");
    
    $error = '';
    $success = '';
    
    if (isset($_POST["submit"])) {
        $no_telefon = mysqli_real_escape_string($sambungan, $_POST["no_telefon"]);
        $password = $_POST["password"];
        $nama_pelanggan = mysqli_real_escape_string($sambungan, $_POST["nama_pelanggan"]);
        
        // Validate phone number
        if (!preg_match("/^[0-9]{10}$/", $no_telefon)) {
            $error = "Nombor telefon mesti mengandungi 10 digit!";
        } else {
            // Check if phone number already exists
            $sql = "SELECT * FROM pelanggan WHERE no_telefon = ?";
            $stmt = mysqli_prepare($sambungan, $sql);
            mysqli_stmt_bind_param($stmt, "s", $no_telefon);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                $error = "Nombor telefon ini sudah didaftarkan!";
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user
                $sql = "INSERT INTO pelanggan (no_telefon, password, nama_pelanggan) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($sambungan, $sql);
                mysqli_stmt_bind_param($stmt, "sss", $no_telefon, $hashed_password, $nama_pelanggan);
                
                if (mysqli_stmt_execute($stmt)) {
                    $success = "Pendaftaran berjaya! Sila log masuk.";
                    // Redirect after 2 seconds
                    header("refresh:2;url=login.php");
                } else {
                    $error = "Pendaftaran gagal! Sila cuba lagi.";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akaun</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <div class="auth-container">
        <h3 class="auth-title">DAFTAR AKAUN</h3>
        
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="success-message"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <form class="auth-form" action="signup.php" method="post">
            <div class="form-group">
                <img src="imej/user.png" alt="User">
                <input type="text" name="no_telefon" class="form-input" 
                       placeholder="Nombor Telefon" 
                       pattern="[0-9]{10}"
                       title="Sila masukkan 10 digit nombor telefon"
                       required>
            </div>
            
            <div class="form-group">
                <img src="imej/user.png" alt="Name">
                <input type="text" name="nama_pelanggan" class="form-input" 
                       placeholder="Nama Penuh" 
                       required>
            </div>
            
            <div class="form-group">
                <img src="imej/lock.png" alt="Password">
                <input type="password" name="password" class="form-input" 
                       placeholder="Kata Laluan" 
                       minlength="6"
                       required>
            </div>
            
            <button type="submit" name="submit" class="auth-button signup-button">Daftar</button>
        </form>
        
        <div class="auth-links">
            <p>Sudah ada akaun? <a href="login.php">Log masuk di sini</a></p>
        </div>
    </div>
</body>
</html>
