let playlist = [];

let index = 0;

let repeatMode = false;

let randomMode = false;


let audio = document.getElementById(“audio”);

let bar = document.getElementById(“progressBar”);


function loadSongs() {

fetch(“api/songs.php”)

.then(r => r.json())

.then(d => {

playlist = d;

renderSongs(d);

});

}

loadSongs();


function renderSongs(list) {

let html = “”;

list.forEach((song, i) => {

html +=          <div class="song" onclick="playIndex(${i})">             <img src="assets/images/${song.cover}">             <div>                 <b>${song.title}</b><br>${song.artist}             </div>         </div>;

});

document.getElementById(“songList”).innerHTML = html;

}


function playIndex(i) {

index = i;

let s = playlist[i];

document.getElementById(“currentTitle”).innerHTML = s.title;

audio.src = “assets/uploads/” + s.file;

audio.play();

}


function nextSong() {

if (randomMode) {

index = Math.floor(Math.random() * playlist.length);

} else {

index++;

if (index >= playlist.length) index = 0;

}

playIndex(index);

}


function prevSong() {

index–;

if (index < 0) index = playlist.length - 1;

playIndex(index);

}


audio.onended = function () {

if (repeatMode) {

audio.currentTime = 0;

audio.play();

} else {

nextSong();

}

};


audio.ontimeupdate = function () {

bar.value = (audio.currentTime / audio.duration) * 100;

};


bar.oninput = function () {

audio.currentTime = audio.duration * (bar.value / 100);

};


function toggleRandom() {

randomMode = !randomMode;

}


function toggleRepeat() {

repeatMode = !repeatMode;

}


function searchMusic() {

let key = document.getElementById(“searchInput”).value;

fetch(“api/search.php?key=” + key)

.then(r => r.json())

.then(d => renderSongs(d));

}
