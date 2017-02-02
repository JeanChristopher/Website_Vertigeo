$('a[href*=\\#]').on('click', function(event){
    event.preventDefault();
    console.log("clicked");
    $('html,body').animate({scrollTop:$(this.hash).offset().top-75}, 500);
});


$('.carousel').carousel({
  interval: 2000
})
