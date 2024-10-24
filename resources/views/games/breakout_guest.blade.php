<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ルーム待機画面</title>
    <link rel="stylesheet" href="{{ asset('/css/breakoutroom.blade.css')}}">
</head>

<body>
    <div class="container">
        <h1>部屋番号:
            <span id="room_id">
                {{$room->id}}
            </span>
        </h1>
        <p>他の参加者を待っています...</p>
        <h1>参加者</h1>
        <span>{{$room->participants}}</span>
        <span> /4</span>
    </div>
</body>

<script>
    setInterval(function(){
        // サーバーに部屋の状態を確認するリクエストを送る
        fetch('/check-room-status/{{ $room->id }}')
            .then(response => response.json())
            .then(data => {
                // 部屋が満員かどうかを確認
                if (data.isFull) {
                    // 部屋が満員になったらプレイ画面にリダイレクト
                    window.location.href = '/gameroom/{{ $room->id }}';
                }
            })
            .catch(error => {
                console.error('Error fetching room status:', error);
            });
    }, 2000); // 1秒ごとにサーバーの状態を確認

    window.addEventListener('beforeunload', (event) => {
        fetch(`/breakout_guest`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRFトークンをヘッダーに追加
                'Content-Type': 'application/json',
            }
        }).then(response => {
            if (!response.ok) {
                console.error('Failed to remove user from room');
            }
        }).catch(error => {
            console.error('Error:', error);
        });

    });
</script>
</html>