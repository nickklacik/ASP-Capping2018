var photo_id;

// Updates the src of the main image tag
function updateImage(newSrc, id, purchased) {
  document.getElementById("image").src = newSrc;
  document.getElementById("printBtn").setAttribute("data-cp-url","https://"+window.location.hostname +"/"+ newSrc);
  photo_id = id;
  if(purchased) {
    document.getElementById("watermark").innerHTML = "";
  } else {
    document.getElementById("watermark").innerHTML = "<span class=\"button\" onclick=\"order()\">Remove Watermark</span>";
  }
}

// Redirects user to order page
function order() {
  window.location.href = "order.php?photo_id="+photo_id;
}

// Deletes Image from user's account
function deleteImage() {
  if(confirm("Are your sure you want to delete this image from your account?")) {
    window.location.href = "delete.php?photo_id="+photo_id;
  }
}