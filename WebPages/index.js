function format() {
  var spacers = document.getElementsByClassName("spacer");
  var height = document.getElementById("OGImage").height;
  for(var i = 0; i < spacers.length; i++) {
    spacers[i].style.height = height + "px";
    spacers[i].style.lineHeight = height + "px";
  }
}

window.onload = format;
window.onresize = format;