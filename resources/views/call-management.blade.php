<?php
/*
新規作成 2021/05/02 javascriptのAPIを使って画面で録音できるようにする



*/



?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/call-management.blade.css') }}">

        <title>架電管理画面</title>
    </head>
    <body>
        <h2 >■架電登録</h2>

        <div class="wrapper">

    <header>
        <h1>レコーダ</h1>
    </header>

    <section class="main-controls">
        <canvas class="visualizer" height="60px"></canvas>
        <div id="buttons">
            <button class="record">再生</button>
            <button class="stop">停止</button>
        </div>
    </section>

    <section class="sound-clips">


    </section>

    </div>

    <label for="toggle">❔</label>
    <input type="checkbox" id="toggle">
    <aside>
    </aside>

    </body>
</html>

