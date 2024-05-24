<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение заказа услуги</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            color: #007bff;
        }
        p {
            margin-bottom: 10px;
        }
        .info {
            background: #f4f4f4;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .image {
            text-align: center;
            margin-bottom: 20px;
        }
        .image img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Подтверждение заказа услуги</h2>
    <div class="info">
        <p><strong>Название услуги:</strong> {{ $service_name }}</p>
        <p><strong>Имя:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Телефон:</strong> {{ $phone }}</p>
    </div>
    <div class="image">
        <img src="https://via.placeholder.com/400x200" alt="Service Image">
    </div>
    <p>Ваш заказ успешно оформлен. Мы свяжемся с вами в ближайшее время.</p>
    <p>Спасибо за выбор наших услуг!</p>
</div>
</body>
</html>
