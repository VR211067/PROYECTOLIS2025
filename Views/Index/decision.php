<!DOCTYPE html>
<html lang="es">
<head>

<?php
$pageTitle = "Decision";
$currentPage = 'descision';
include 'includes/header.php';
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Red de Donantes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(-45deg,rgb(209, 15, 15),rgb(245, 54, 70),rgb(250, 125, 125),rgb(247, 183, 158));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        h1 {
            color: #fff;
            font-size: 3em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .btn-custom {
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            text-transform: uppercase;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4);
        }

        .btn-custom:active {
            transform: scale(0.98);
        }

        .btn-admin {
            background-color: #d9534f;
            color: white;
        }

        .btn-donante {
            background-color: #5bc0de;
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .overlay > * {
            animation: fadeIn 1s ease forwards;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>Bienvenido al Centro de Donación de Sangre</h1>
        <a href="/Red_Donantes/AdminAuth/login" class="btn btn-custom btn-admin">Iniciar Sesión como Administrador y/o Doctor</a>
        <a href="/Red_Donantes/Auth/login"  class="btn btn-custom btn-donante">Iniciar Sesión como Donante</a>
    </div>
</body>
</html>

<?php include 'includes/footer.php'; ?>