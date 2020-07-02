function showComments(str) {
  if (str.length == 0) {
    document.getElementById("comments"+str).innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("comments"+str).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "http://localhost/lessons/Socialmedia/Comments/comments/" + str, true);
    xmlhttp.send();
  }
}
function showLikes(str) {
  if (str.length == 0) {
    document.getElementById("mylikes"+str).innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("mylikes"+str).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "http://localhost/lessons/Socialmedia/Likes/likes/" + str, true);
    xmlhttp.send();
  }
}

function addLike(str) {
  if (str.length == 0) {
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "http://localhost/lessons/Socialmedia/Likes/like/" + str, true);
    xmlhttp.send();
  }
}