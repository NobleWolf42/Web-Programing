var counter = 0;
var currentcolor = 1;
function cyclecolor() {
  if (counter == 11) {
    counter = 0;
  }
  else {
    counter = counter + 1;
  }
  if (counter == 10) {
      document.getElementById("counter").innerHTML="Counter: " + counter;
  }
  else if (currentcolor == 1) {
    document.getElementById("redbluesquare").src="images/squareRed.jpg";
    document.getElementById("counter").innerHTML="Counter: " + counter;
    currentcolor = 0;
  }
  else {
    document.getElementById("redbluesquare").src="images/squareBlue.jpg";
    document.getElementById("counter").innerHTML="Counter: " + counter;
    currentcolor = 1;	
  }
}
function mousealert() {
  window.alert("I feel a mouse!");
}
function changemessage() {
  document.getElementById("message").innerHTML="Message: \"Google will Be opened in a new tab when your mouse leaves that square.\"";
}
function redirect() {
  window.open('http://www.google.com', '_blank');
  document.getElementById("message").innerHTML="Message: \"Watch Me!\"";
}