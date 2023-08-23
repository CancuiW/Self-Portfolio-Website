 <!-- 
@Author: Can Cui
@Date: April 18, 2023
@PHP Version: PHP 8.0
@Purpose: Display the Map and the weather of WSU.


-->
<div id='weatherWSU'>
    <h3>The Location of WSU</h3>
    <div class='icon'>
        
<!--call the $data to get the weather information -->
        <img
            src="https://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> 
            <?php echo $data->main->temp; ?>°C
        <?php echo ucwords($data->weather[0]->description); ?>
    
    </div>   

</div>
      








<div class="mapContainer">
    <a class="direction-link" target="_blank" href="//maps.google.com/maps?f=d&amp;daddr=42.35926562573236,-83.06658911760802&amp;hl=en"> Get Directions</a>
    <div id="map"></div>
</div>





<!--Write JavaScript to retrieve the JSON data from the PHP script -->
 <script>
        // Initialize and add the map
       
        function initMap() {
            // The location of myLocation
            //const myLocation = { lat: <?php //echo $data->coord->lat; ?>, lng: <?php // echo $data->coord->lon; ?> };
            //WSU's location
            const myLocation = { lat:42.35926562573236 , lng:-83.06658911760802 };
            // The map, centered at myLocation
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: myLocation
            });
            // The marker, positioned at myLocation
            const marker = new google.maps.Marker({
                position: myLocation,
                map: map
            });
        }
        </script>
     <script
        
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWliqYnj_S9FJ_EQ1Xeco2aUR_ZRVq3FY&callback=initMap&libraries=&v=weekly"
        async>
    </script>