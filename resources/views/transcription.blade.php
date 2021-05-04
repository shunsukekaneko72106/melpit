<?php
/*
新規作成 2021/05/04 文字起こし画面



*/

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/call-management.css') }}">

        <title>文字起こし画面</title>
    </head>
    <body>
        <h2 >■文字起こし登録</h2>
        <button id="btn">start</button>
        <div id="content"></div>

    <script>
    //文字起こしAPI?
    const speech = new webkitSpeechRecognition();
    speech.lang = 'ja-JP';

    const btn = document.getElementById('btn');
    const content = document.getElementById('content');

    btn.addEventListener('click' , function() {
        speech.start();
    });

    speech.onresult = function(e) {
        speech.stop();
        if(e.results[0].isFinal){
            var autotext =  e.results[0][0].transcript
            content.innerHTML += '<div>'+ autotext +'</div>';
        }
    }

    speech.onend = () => {
    speech.start()
    };

    </script>


    </body>
</html>

