<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GameRoom</title>
        <link rel="stylesheet" href="{{ asset('/css/gameroom.blade.css')}}">
    </head>
    <body>
        <script src="result.js"></script>

        <div id="all-container">
            <h1>GameRoom</h1>
            <!-- ゲーム指示 -->
            <div id="instructions-container">
                <div id="title-container">
                    <div class="instructions">お題:</div>
                    <span id="theme">
                        {{$choosed_Theme->theme}}
                    </span>
                </div>
                <div id="card_number-container">
                    <div class="instructions">あなたのカード番号</div>
                    <span id="card-number">
                        {{$user->card_number}}
                    </span>
                </div>
            </div>
            <h1>小さい順に並べよう!!</h1>
            <!-- 以下はチャットルーム -->
            <!-- <div id="chat-container">
                <div id="chat-left">
                    <div class="chat-text">
                        左側のチャットメッセージ
                    </div>
                </div>
                <div class="chat-clear"></div>
                <div id="chat-right">
                    <div class="chat-text">
                        右側のチャットメッセージ
                    </div>
                </div>
                <div class="chat-clear"></div>
                <div id="chat-send-container">
                    <input id="chat-message-text" type="text"></input>
                    <button id="chat-message-send-button">送信</button>
                </div>
            </div> -->

            <form action="{{ route('Result') }}" method="POST">
                @csrf
                <button type="submit" class="go-result-button">結果を見る</button>
            </form>
            
        </div>

        <div>

        </div>
    </body>

</html>

<script>

</script>
