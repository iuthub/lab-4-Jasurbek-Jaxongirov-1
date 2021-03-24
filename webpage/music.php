<?php
    $playlist = $_REQUEST["playlist"];
    $root = "./";
    $song_folder = $root."songs/";

    function file_size_info($size = 0){
        if($size>=0 && $size<=1023)
        {
            $size .="bytes";
        }
        elseif($size>=1024 && $size<=1048575)
        {
            $size =round($size / 1024);

            $size .= "KB";
        }
        else{
            $size = round($size / (1024*1024));
            $size .= "MB";
        }


        return $size;
    }
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
            if(file_exists($song_folder.$playlist) && isset($playlist)){
            $playlist_musics = file($song_folder.$playlist,FILE_IGNORE_NEW_LINES);
            foreach ($playlist_musics as $musics){

        ?>
        <li class="mp3item">
            <a download="" href="<?=$song_folder.$musics?>"><?= $musics ?></a>(<?=file_size_info(filesize($song_folder.$musics))?>)
        </li>
        <?php
        }
        }
            else{

            $music_files = glob($song_folder."/*.mp3");
            foreach($music_files as $file_names){
        ?>
        <li class="mp3item">

            <a download="" href="songs/<?= $file_names ?>>"><?= basename($file_names) ?></a>(<?=file_size_info(filesize($file_names))?>)
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
                <a download="" href="songs/<?= $file_names ?>>"><?= basename($file_names) ?></a>(<?=file_size_info(filesize($file_names))?>)
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
