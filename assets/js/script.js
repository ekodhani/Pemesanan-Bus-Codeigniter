$(document).ready(function(){
    $("#menu").click(function(e) {
      e.preventDefault();
    $("#container").toggleClass("toggled");
    });
});