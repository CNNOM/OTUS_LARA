<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ htmlspecialchars($name) }}</h1>
    <h1>{!! htmlspecialchars($test) !!}</h1>
    <ol>
        <?php
        $ar = [1, 2, 4, 5,"", 6];
        $ar2 = [];
        ?>
        @dump($ar)
        @for ($i = 0; $i < 10; $i++)
            <li>{{ $i }}</li>
        @endfor
        @foreach ($ar as $item)
            @dump($loop)

            <li>{{ $item }}</li>
        @endforeach

        @forelse ($ar2 as $item)
            <li>{{ $item }}</li>
            
        @empty
            <li>Пусто</li>
            
        @endforelse
    </ol>
</body>

</html>
