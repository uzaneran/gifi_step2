<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            body{
                font-family: 'Helvetica Neue';
                color: #5E5C5C;
                background: #f6f6f6;
            }
            #header{ width:960px; text-align:center; position:absolute; top:0; left:0;}
            #video{position:relative; top: 300px; border: 2px white solid; margin-bottom: 100px;}
            #wrapper{ position:relative; width:960px; margin:0 auto;}
            h1{margin:20px;padding:0;font-size:175px;line-height:1;}
            h2{font-size:30px;}
            select{height: 40px;width: 300px;border: 1px solid #f6f6f6;font-size: 20px;}
            .buttons{display: inline;position: relative; margin-left: 500px;}
            button{margin: 10px;}
        </style>
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

                <select id="user-select"></select>

                <div class="buttons">
                    <button id="play" type="button">PLAY</button>
                    <button id="pause" type="button">PAUSE</button>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
        <script>
            // This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement("script");

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName("script")[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            /* This function creates an <iframe> (and YouTube player)
             * after the API code downloads.
             * and when the player is ready - creates buttons events */

            var player;
            function onYouTubePlayerAPIReady() {
                player = new YT.Player("player", {height: "500", width: "956", videoId: "AP7BmfaAFQc", events: {onReady: onPlayerReady}});
                document.getElementById("play").onclick = function () {
                    player.playVideo();
                }
                document.getElementById("pause").onclick = function () {
                    player.pauseVideo();
                }
            }

            // The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                event.target.playVideo();
            }

            //creates the select&options Html markup
            var markup = '<option value="none" disabled selected>Choose friend</option>';

            //Get json file with the user's details
            $.getJSON("http://learn.gifi.co.il/api/users/", function (result) {

                $.each(result.users, function (key, value) {
                    markup +="<option value='" + value.video + "'>" + value.fullname + "</option>";
                });

                $("#user-select").html(markup).on('change', function () {
                    //get the video id               
                    var videoId = $(this).val().indexOf("v=") != -1 ? $(this).val().split("v=")[1]: '7eKppS5cDKk';
                    console.log(videoId);
                    player.loadVideoById(videoId)
                });
            });
        </script>
    </body>
</html>
