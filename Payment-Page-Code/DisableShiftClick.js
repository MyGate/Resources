<!-- Script below checks to see if both the Shift key and a mouse click is pressed. If it is, It alerts a message and returns false.--->
function mouseDown(e) {

var shiftPressed=0;
var evt = e?e:window.event;
if (parseInt(navigator.appVersion)>3) {
if (document.layers && navigator.appName=="Netscape") {
shiftPressed=(evt.modifiers-0>3);
}
else { 
shiftPressed=evt.shiftKey;
}
if (shiftPressed) {
alert ("Shift-click is disabled.");
return false;
}
}
return true;
}
if (parseInt(navigator.appVersion)>3) {
document.onmousedown = mouseDown;
if (document.layers && navigator.appName=="Netscape") {
document.captureEvents(Event.MOUSEDOWN);
}
}