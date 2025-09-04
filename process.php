<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("<div class='error'>❌ Database Connection Failed: " . $conn->connect_error . "</div>");
}


$full_name = trim($_POST['full_name']);
$email = trim($_POST['email']);
$department = trim($_POST['department']);
$matric_number = trim($_POST['matric_number']);


if (empty($full_name) || empty($email) || empty($department) || empty($matric_number)) {
    die("<div class='error'>⚠️ All fields are required!</div>");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<div class='error'>⚠️ Invalid email format!</div>");
}
$sql = "INSERT INTO student_records (full_name, email, department, matric_number)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $email, $department, $matric_number);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
    <style>
        body {
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            background: radial-gradient(circle at 20% 20%, #ffecd2 0%, #fcb69f 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .message-box {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px) saturate(180%);
            border-radius: 28px;
            box-shadow: 0 12px 40px rgba(252, 182, 159, 0.18);
            width: 420px;
            padding: 48px 36px 36px 36px;
            border: 2px solid rgba(252, 182, 159, 0.18);
            text-align: center;
            animation: popIn 0.7s cubic-bezier(.68,-0.55,.27,1.55);
        }

        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.8); }
            80% { opacity: 1; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }

        .success {
            color: #ff7e5f;
            background-color: #fffbe6;
            padding: 18px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 1.08rem;
            font-weight: 600;
            box-shadow: 0 2px 8px #ff7e5f22;
        }
        .error {
            color: #d7263d;
            background-color: #ffe3e3;
            padding: 18px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 1.08rem;
            font-weight: 600;
            box-shadow: 0 2px 8px #d7263d22;
        }
        a {
            text-decoration: none;
            background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%);
            color: #fff;
            padding: 12px 20px;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1.05rem;
            margin: 0 8px;
            box-shadow: 0 2px 8px #ff7e5f22;
            transition: background 0.3s, transform 0.2s;
            display: inline-block;
        }
        a:hover {
            background: linear-gradient(90deg, #feb47b 0%, #ff7e5f 100%);
            transform: scale(1.04);
        }
    </style>
</head>
<body>
    <div class="message-box">
        <?php
        if ($stmt->execute()) {
            echo "<div class='success'>✅ Student registered successfully!</div>";
            echo "<a href='view.php'>View Students</a> | <a href='index.php'>Register Another</a>";
        } else {
            echo "<div class='error'>❌ Error: " . $stmt->error . "</div>";
            echo "<a href='index.php'>Go Back</a>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
