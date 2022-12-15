var profileBox = document.getElementById("profile-box");

var btn = document.getElementById("update-button");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
  profileBox.style.display = "block";
};

span.onclick = function () {
  profileBox.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == profileBox) {
    profileBox.style.display = "none";
  }
};
