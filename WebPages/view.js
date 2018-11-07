var photo_id;

function updateImage(newSrc, id) {
  document.getElementById("image").src = newSrc;
  photo_id = id;
}

function order() {
  window.location.href = "order.php?photo_id="+photo_id;
}