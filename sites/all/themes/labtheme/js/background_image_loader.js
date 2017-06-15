(function ($) {
  $(document).ready(function() {

    var images = {
      right: $("#hero-bkgrd-right"),
      left: $("#hero-bkgrd-left")
    };

    var IMG_PREFIX = "hero_bkgrd_hires_";
    var pathArray = images.right.css("background-image").split(IMG_PREFIX);
    var number = getNumber();
    var url = pathArray[0];

   // Iterate through object, update image path and apply to css 
    Object.keys(images).map( function (key, idx) {
      var val = images[key];
      var newImg = getNewImage(number, key);
      var newPath = [url, IMG_PREFIX, newImg].join("");
      $(val).css( { "background-image" : newPath } );
    });

  // Generate a random number between 1-3 for random image selection
    function getNumber() {
      return Math.ceil( Math.random() * 3 ) + "";
    }

  // Build the end of the image path using the random number and direction
    function getNewImage(num, direction) {
      return [direction, "_new_", num, ".jpg"].join("");
    }

  });
})(jQuery);
