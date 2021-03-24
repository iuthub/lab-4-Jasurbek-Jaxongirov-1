<?php
    $playlist = $_REQUEST["playlist"];
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Viewer</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>


<div id="listarea">
    <ul id="musiclist">
        <?php
        if(!isset($playlist))
        {
        ?>

        <?php
            $root = "./";
            $song_folder = $root."/songs";
            $music_files = glob($song_folder."/*.m*");
            foreach($music_files as $file_names){
        ?>
        <li class="mp3item">
            <a href="songs/<?= $file_names ?>>"><?= basename($file_names) ?></a>
        </li>
        <?php
            }
        ?>
        <?php
        $root = "./";
        $song_folder = $root."/songs";
        $text_files = glob($song_folder."/*.txt");
        foreach($text_files as $file_names){
            ?>
            <li class="playlistitem">
                <a href="songs/<?= $file_names ?>>"><?= basename($file_names) ?>></a>
            </li>
            <?php
        }
        ?>
        <?php
            }

        ?>
    </ul>
</div>
</body>
</html>
