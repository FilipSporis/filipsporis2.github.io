/*VIDEO PLAYER*/

var video = document.querySelector('.video');
var juice = document.querySelector('.blue-juice');
var btn = document.getElementById('play-pause');

function togglePlayPause() {
	if(video.paused) {
		btn.className = 'pause';
		video.play();
	}
	else {
		btn.className = 'play';
		video.pause();
	}
}

btn.onclick = function() {
	togglePlayPause(); 
};

video.addEventListener('timeupdate', function() {
	var juicePos = video.currentTime / video.duration;
	juice.style.width = juicePos * 100 + "%";
	if(video.ended) {
		btn.className = "play";
	}
})

/*TOGGLE HIDDEN CONTENT*/

function toggleHiddenContent1() {
    var x = document.getElementById("myContent1");
    if (x.style.display == "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function toggleHiddenContent2() {
    var x = document.getElementById("myContent2");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function toggleHiddenContent3() {
    var x = document.getElementById("myContent3");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}