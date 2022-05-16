<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
    <style>
        html,
        body {
            height: 100%;
        }

    </style>
</head>

<body>

    <embed src="{{ asset('book/naruto.pdf') }}" width="800px" height="2100px" />
</body>

</html>
