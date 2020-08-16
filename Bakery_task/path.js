let colors = ['black','white','black'];

let button = document.getElementById('sun');

button.addEventListener('click', function(){
    var randomColor = colors[Math.floor(Math.random() * colors.length)]

    let container = document.getElementById('house');

    container.style.background = randomColor;
});

$(document).ready(function(){
    $('#button-two').click(function(){
      $('#box-two').css("transform","translateY(250px)");
    });
  });