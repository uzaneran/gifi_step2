<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title></title>
    </head>
    <body>
        <div id="wrapper">

            <div id="header">
                <h1>FavorTube</h1>
                <h2>Video sharing community</h2>
            </div>
            <div id="video">
                <div id="player"></div>

                <select id="user-select">
                    <option>Choose friend...</option>
                </select>
                
                <div class="buttons">
                    <button id="play" type="button"><img src="play.png" width="30"</button>
                    <button id="pause" type="button"><img src="pause.png" width="30"</button>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
