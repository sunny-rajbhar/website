<?php 
include 'header.php';
?>
<div class="row">
  <div class="col-4 article">
    <center>
    <h1>Contact Us</h1>
    <p>Email us with any question or inquiries or call 123-456-7890.<br>
      We would be happy to answer your questions and set up a meeting with you. Discussion Forum can help you apart from the flock!</p>
    </center>
  </div>
</div>
<div class="row">
    <div class="col-6 aside2">
      <h2>If Any Queries</h2>
      <form action="">
          <label for="name"><b>Name</b></label>
          <input type="text" name="FirstName" placeholder="Name"><br>
          <label for="email"><b>Email</b></label>
          <input type="text" name="LastName" placeholder="Email"><br>
          <label for="subject"><b>Subject</b></label>
          <input type="text" name="LastName" placeholder="Subject"><br>
          <label for="message"><b>Message</b></label>
        <textarea rows="4" cols="30" placeholder="Describe in brief.."></textarea><br>
        <input type="submit" value="Submit">
      </form>
    </div>
    <div class="col-6 map" >
        <h3>Google Map</h3>
    <div class="imap" id="map"></div>
    </div>
</div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(18.997954, 72.852405);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7wKjMfXH1tQlKZpiv3KPA4ajACzyJ-Hw&callback=myMap"></script>

<?php include 'footer.php'; ?>