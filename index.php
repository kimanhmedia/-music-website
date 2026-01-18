<?php include “database.php”; ?>

<!DOCTYPE html>

<html>

<head>

<meta charset=“utf-8”>

<title>Music Player</title>

<link rel=“stylesheet” href=“assets/css/style.css”>

</head>

<body>


<div class=“container”>


<h2>🎵 Danh sách bài hát</h2>


<input type=“text” id=“searchInput” placeholder=“Tìm bài hát…” onkeyup=“searchMusic()”>


<div id=“songList”></div>


<div class=“player”>

<h3 id=“currentTitle”>Chọn bài để phát</h3>


<audio id="audio" controls autoplay></audio>

<input type="range" id="progressBar" value="0">

<div class="controls">
    <button onclick="prevSong()">⏮ Prev</button>
    <button onclick="nextSong()">⏭ Next</button>
    <button onclick="toggleRandom()">🔀 Random</button>
    <button onclick="toggleRepeat()">🔁 Repeat</button>
</div>
Copy

</div>


</div>


<script src=“assets/js/player.js”></script>


</body>

</html>

