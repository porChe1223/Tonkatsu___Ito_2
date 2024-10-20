<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ito</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.blade.css') }}">
</head>

<body>
    <div class="container">
        <h1>Ito</h1>
        <p>自分の数字を言葉で表現しよう</p>
        <!-- ランダムマッチング -->
        <form action="{{ route('goMatchingRoom') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">マッチングを開始</button>
        </form>
        <!-- ルーム作成 -->
        <form action="{{ route('makeBreakoutRoom') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">ルームを作成</button>
        </form>
        <!-- ルーム参加 -->
        <form action="{{ route('joinBreakoutRoom') }}" method="POST">
            @csrf
            <input type="number" id="roomId" name="roomId" required>
            <button type="submit" class="btn btn-primary">検索</button>
        </form>


        <p>自分で考えたお題を登録してみよう</p>

        <form action="{{ route('MakeTheme') }}" method="POST">
            @csrf
            <input type="text" id="ThemeIdea" name="ThemeIdea" required>
            <button type="submit" class="btn btn-primary" onclick="clickEvent()">お題を登録</button>
        </form>
    </div>

    <script>
        function clickEvent() {
            alert("登録しますか？");
        }
    </script>
</body>

</html>