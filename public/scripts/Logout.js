var items = document.querySelectorAll("#sidebar .items .item");
var last = items[items.length - 1];
last.style.bottom = "0px";
last.style.left = "16px";
last.style.position = "absolute";
last.onclick = function () {
  $("#loading-wrap").show();
  $("#loading-wrap").fadeOut("slow");
  document.cookie = "access=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "refresh=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  window.location.replace("/login");
};
