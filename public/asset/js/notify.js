var modal = document.getElementById("notifyModal");
var btn = document.getElementById("notify");
var close = document.getElementById("closenotify"); 
var closen = document.getElementById("closebuttonnotify"); 
btn.onclick = function() {
  modal.style.display = "block";
}
close.onclick = function() {
  modal.style.display = "none";
}
closen.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


