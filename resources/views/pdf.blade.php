<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отчет о свободных домах</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>

</head>
<body>
<h1>Отчет о свободных домах</h1>

@foreach ($houses as $house)
    <h2>Дом: {{ $house->name }}</h2>
    <ul>
        @foreach ($house->dates as $date)
            <li>Бронированная дата: {{ $date->start_date }} - {{ $date->end_date }}</li>
        @endforeach
    </ul>
@endforeach
</body>
</html>
