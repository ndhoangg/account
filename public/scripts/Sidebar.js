$(document).ready(function(){
  $("#sidebar .items .item").click(function() {
    $("#sidebar .items .item").not(this).removeClass('active')
    $(this).toggleClass('active')
  })
})

