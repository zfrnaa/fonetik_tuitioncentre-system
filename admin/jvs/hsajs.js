// JavaScript Document

window.onscroll = function() {stickyheader()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function stickyheader() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
