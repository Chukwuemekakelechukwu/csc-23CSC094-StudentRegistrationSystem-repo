<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
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

        .container {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px) saturate(180%);
            border-radius: 28px;
            box-shadow: 0 12px 40px rgba(252, 182, 159, 0.18);
            width: 390px;
            padding: 48px 36px 36px 36px;
            border: 2px solid rgba(252, 182, 159, 0.18);
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

        label {
            font-weight: 700;
            display: block;
            margin-top: 18px;
            color: #ff7e5f;
            letter-spacing: 1px;
            font-size: 1.05rem;
        }

        input {
            width: 100%;
            padding: 13px 12px;
            margin-top: 8px;
            border: 2px solid #ff7e5f33;
            border-radius: 16px;
            outline: none;
            font-size: 1.05rem;
            background: rgba(255,255,255,0.85);
            transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
        }

        input:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 12px #ff7e5f44;
            background: #fffbe6;
            animation: shake 0.2s linear;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-2px); }
            50% { transform: translateX(2px); }
            75% { transform: translateX(-2px); }
            100% { transform: translateX(0); }
        }

        button {
            width: 100%;
            background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%);
            color: #fff;
            border: none;
            padding: 16px;
            margin-top: 32px;
            font-size: 1.15rem;
            font-weight: 700;
            border-radius: 16px;
            cursor: pointer;
            box-shadow: 0 4px 16px #ff7e5f22;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background: linear-gradient(90deg, #feb47b 0%, #ff7e5f 100%);
            transform: scale(1.04);
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 28px;
            text-decoration: none;
            color: #ff7e5f;
            font-weight: 600;
            font-size: 1.05rem;
            letter-spacing: 1px;
            transition: color 0.2s;
        }

        .link:hover {
            text-decoration: underline;
            color: #feb47b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Registration</h2>
        <form action="process.php" method="POST">
            <label>Full Name:</label>
            <input type="text" name="full_name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Department:</label>
            <input type="text" name="department" required>

            <label>Matric Number:</label>
            <input type="text" name="matric_number" required>

            <button type="submit">Register</button>
        </form>
        <a href="view.php" class="link">View Registered Students</a>
    </div>
</body>
</html>