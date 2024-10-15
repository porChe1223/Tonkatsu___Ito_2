<!DOCTYPE html>
<html lang="Ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>マッチング画面</title>
    <link rel="stylesheet" href="{{ asset('css/matching.css') }}">
</head>
<body>
    <div class="container">
        <h1>マッチング中...</h1>
        <p>他の参加者を待っています...</p>
    </div>
    <script>
        setInterval(function(){
            location.reload();
        }, 5000); // 5秒ごとにリロード
    </script>
</body>
</html>
