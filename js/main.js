function get_ap()
{
    $.ajax({
        url: "services/get_ap.php",
        type: 'post',
        success: function (response) {
            // you will get response from your php page (what you echo or print)     
            let obj = $.parseJSON(response);     
            let ap_map = $.parseJSON(obj.data);     
            console.log(ap_map);
            
                var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 16, /** ขนาดตอนเปิดครั้งแรก Size First Time Open map */
                        center: new google.maps.LatLng(ap_map[0].lati, ap_map[0].longti), /** กำหนดจุดเปิดครั้งแรก Point First Time Open map */
                        mapTypeId: 'satellite'
                    });

                var infowindow = new google.maps.InfoWindow();
                var marker, i;

                ap_map.forEach((item) => {
                    
                    marker = new google.maps.Marker({
                        icon: item.img, /** icon color or images */
                        position: new google.maps.LatLng(item.lati, item.longti),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                        infowindow.setContent(item.name);
                        infowindow.open(map, marker);
                        }
                    })(marker, i));
                    i++;
                    
                })
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
}


    
  