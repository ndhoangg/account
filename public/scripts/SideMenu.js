$(document).ready(function(){
    $("#menu .list .box .li").click(function() {
      $("#menu .list .box .li").not(this).removeClass('active')
      $(this).toggleClass('active')
    })
  })