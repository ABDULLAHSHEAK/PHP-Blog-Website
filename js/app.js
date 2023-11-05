    function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // 0 should be displayed as 12
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('clock').innerHTML = timeString;
        }

setInterval(updateClock, 1000); 
        

// ---------------------------- slider js -------------------

 
$(document).ready(function() {
    $("#news-slider").owlCarousel({
        items:3,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[980,2],
        itemsMobile:[600,1],
        pagination:false,
        navigationText:false,
        autoPlay:true
    });
});
// ---------------------------- slider js -------------------