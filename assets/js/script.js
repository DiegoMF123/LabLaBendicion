function iniciarMap(){
    var coord = {lat:14.6291602 ,lng: -90.5772228};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 18,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}
