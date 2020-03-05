function enlargethumb(pic) {
  var filename = "images/pic0" + pic + "_thx.jpg";
  var elementid = "thumb0" + pic; 
  if (pic == 01) {
    pad = "padding: 25px 12px 25px 50px;"
  }
  else {
    pad = "padding: 25px 12px 25px 0px;"
  }
  document.getElementById(elementid).src=filename;
  document.getElementById(elementid).style=pad;
}
  function reducethumb(pic) {
  var filename = "images/pic0" + pic + "_th.jpg";
  var elementid = "thumb0" + pic; 
  if (pic == 01) {
    pad = "padding: 50px 50px 50px 50px;"
  }
  else {
    pad = "padding: 50px 50px 50px 0px;"
  }
  document.getElementById(elementid).src=filename;
  document.getElementById(elementid).style=pad;
}
function changbigpic(pic) {
  var filename = "images/pic0" + pic + ".jpg";
  document.getElementById("bigimage").src=filename;
}