<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #e74c3c;
        }

        .back-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #2980b9;
        }

        p {
            padding: 25px;
        }
    </style>
</head>

<body>
<div class="error-container">
    <h2>Błąd</h2>

    <?php if(isset($_GET['errors']) && is_array($_GET['errors'])): ?>
            <?php foreach ($_GET['errors'] as $error): ?>
                <p><?php echo urldecode($error); ?></p>
            <?php endforeach; ?>
    <?php else: ?>
        <p>Nieznany błąd</p>
    <?php endif; ?>

    <a href="javascript:history.back()" class="back-button">Powrót</a>
</div>
</body>


</html>
