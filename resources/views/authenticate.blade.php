<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listen Together</title>
</head>
<body>
    <a href="https://www.last.fm/api/auth/?api_key={{ env('LASTFM_API_KEY') }}">Authenticate</a>
</body>
</html>
