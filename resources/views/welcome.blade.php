<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSO Laravel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #4b79a1;
            letter-spacing: 1px;
        }

        p {
            font-size: 18px;
            margin-bottom: 40px;
            color: #6c757d;
        }

        .btn {
            font-size: 18px;
            padding: 15px 30px;
            border-radius: 30px;
            background: linear-gradient(to right, #56ab2f, #a8e063);
            color: white;
            text-decoration: none;
            transition: 0.4s;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px; /* Memberikan jarak antar tombol */
        }

        .btn:hover {
            background: linear-gradient(to right, #43cea2, #185a9d);
            transform: scale(1.05);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.3);
            transition: 0.4s;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            z-index: 1;
        }

        .btn:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn span {
            position: relative;
            z-index: 2;
        }

        .wave {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
//            background: url('https://svgshare.com/i/_bA.svg') repeat-x;
            background-size: contain;
            animation: wave-animation 10s linear infinite;
        }

        @keyframes wave-animation {
            0% {
                background-position-x: 0;
            }
            100% {
                background-position-x: 1000px;
            }
        }
    </style>
</head>
<body>

    <div class="container">        
        <!-- Tombol Login SSO -->
        <a href="/cas-login" class="btn">
            <span>Login SSO</span>
        </a>

        <!-- Tombol Unggah File -->
        <a href="/upload" class="btn">
            <span>Upload File</span>
        </a>

        <!-- Tombol Admin MinIO -->
        <a href="http://192.168.150.50:9000" class="btn" target="_blank">
            <span>Admin MinIO</span>
        </a>
    </div>

    <div class="wave"></div>

</body>
</html>
