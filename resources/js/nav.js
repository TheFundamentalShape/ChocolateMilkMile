// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("header");
var fullNav = document.getElementById("fullNav");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > sticky) {
        fullNav.classList.add('block');
        fullNav.classList.remove('hidden');
        header.classList.add('hidden');
    } else {
        fullNav.classList.remove('block');
        fullNav.classList.add('hidden');

        header.classList.remove('hidden');
        header.classList.add('block');
    }
}