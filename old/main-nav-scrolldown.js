window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 50) {
        document.getElementById("main-navbar").style.top = "0";
    } else {
        document.getElementById("main-navbar").style.top = "-60px";
    }
}