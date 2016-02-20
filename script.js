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
