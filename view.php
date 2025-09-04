<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM student_records WHERE id=$id");
    // Renumber IDs to be sequential from 1 to n
    $conn->query("SET @num := 0");
    $conn->query("UPDATE student_records SET id = @num := @num + 1");
    $conn->query("ALTER TABLE student_records AUTO_INCREMENT = 1");
    header("Location: view.php");
    exit;
}


$result = $conn->query("SELECT * FROM student_records");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Students</title>
    <style>
        body {
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            background: radial-gradient(circle at 20% 20%, #ffecd2 0%, #fcb69f 100%);
            margin: 0;
            padding: 30px;
        }

        .container {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px) saturate(180%);
            border-radius: 28px;
            box-shadow: 0 12px 40px rgba(252, 182, 159, 0.18);
            padding: 48px 36px 36px 36px;
            border: 2px solid rgba(252, 182, 159, 0.18);
            max-width: 900px;
            margin: 0 auto;
            animation: popIn 0.7s cubic-bezier(.68,-0.55,.27,1.55);
        }

        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.8); }
            80% { opacity: 1; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }

        h2 {
            text-align: center;
            color: #ff7e5f;
            margin-bottom: 32px;
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-shadow: 0 2px 8px #fcb69f44;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: rgba(255,255,255,0.85);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 8px #ff7e5f22;
        }

        table th, table td {
            padding: 14px 18px;
            border: 1px solid #ff7e5f33;
            text-align: center;
            font-size: 1.05rem;
        }

        table th {
            background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%);
            color: #fff;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
        }

        table tr:nth-child(even) {
            background-color: #fffbe6;
        }

        table tr:hover {
            background-color: #ffe3e3;
        }

        a.delete-btn {
            color: #fff;
            background: linear-gradient(90deg, #dc3545 0%, #ff7e5f 100%);
            padding: 8px 16px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 2px 8px #dc354522;
            transition: background 0.3s, transform 0.2s;
            display: inline-block;
        }

        a.delete-btn:hover {
            background: linear-gradient(90deg, #ff7e5f 0%, #dc3545 100%);
            transform: scale(1.04);
        }

        a.back-link {
            display: inline-block;
            margin-top: 28px;
            text-decoration: none;
            background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%);
            color: #fff;
            padding: 12px 20px;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1.05rem;
            box-shadow: 0 2px 8px #ff7e5f22;
            transition: background 0.3s, transform 0.2s;
        }

        a.back-link:hover {
            background: linear-gradient(90deg, #feb47b 0%, #ff7e5f 100%);
            transform: scale(1.04);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registered Students</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Matric Number</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['full_name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['matric_number']; ?></td>
                <td><a href="view.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this student?')">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="index.php" class="back-link">Register Another Student</a>
    </div>
</body>
</html>
