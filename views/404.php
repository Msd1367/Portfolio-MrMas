<?php
header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>صفحه پیدا نشد</title>
    <style>
        @import url('https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css');
        body {
            font-family: 'Vazir', sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f5f5f5;
            color: #333;
        }
        h1 {
            font-size: 80px;
            color: #ff6347;
        }
        p {
            font-size: 24px;
            margin-bottom: 30px;
        }
        a {
            color: #ff6347;
            text-decoration: none;
            font-size: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>۴۰۴</h1>
        <p>صفحه مورد نظر شما پیدا نشد.</p>
        <p>به <a href="home">صفحه اصلی</a> برگردید.</p>
    </div>
</body>
</html>
