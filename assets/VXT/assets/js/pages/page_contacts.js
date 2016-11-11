var ContactPage = function () {

    return {
        
    	//Basic Map
        initMap: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
				scrollwheel: false,				
				lat: 24.997778,
				lng: 121.485745
			  });
			  
			  var marker = map.addMarker({
				lat: 24.997778,
				lng: 121.485745,
	            title: 'Company, Inc.'
		       });
			});
        },

        //Panorama Map
        initPanorama: function () {
		    var panorama;
		    $(document).ready(function(){
		      panorama = GMaps.createPanorama({
		        el: '#panorama',
				lat: 24.997778,
				lng: 121.485745,
		      });
		    });
		}        

    };
}();