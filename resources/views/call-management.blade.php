<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>架電管理画面</title>
    </head>
    <body>
        <h3 class="border-start-0">架電登録</h3>
        
        <div id="new">
            <p>新規</p>
            <div id="recorder" class="default">
                <a id="startButton">開始</a>
                <a id="pauseButton">一時停止</a>
                <a id="resumeButton">再開</a>
                <a id="stopButton">停止</a>
                <audio id="player" controls></audio>
                <a id="deleteButton">削除</a>
                <a id="saveButton">保存</a>
            </div>
            <div id="unableRecord">
                <p>録音できません。マイクが無効になっているか、ブラウザが録音機能に対応していません。</p>
            </div>
        </div>
            <div id="saved">
            <p>保存済み</p>
            <table>
                <thead>
                <tr>
                    <th>作成日時</th>
                    <th>録音</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
            </div>
            <script type="text/html" id="saved-tbody-template">
            <tr>
                <td><%= created %></td>
                <td><audio src="<%= file %>" controls></td>
            </tr>
            </script>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        -->
    </body>
</html>
