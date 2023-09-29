<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h1>Planets</h1>
@foreach ($planets as $plant)

 

        <h2>{{ $plant['name'] }}</h2>
         {{ $plant['description'] }}

    @endforeach
    
</body>
</html>