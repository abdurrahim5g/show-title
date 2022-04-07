/**
 * --> Get the image id from this file
 *
 * Ready the document
 */

jQuery(document).ready(function () {
  var imagesID = [];
  var imagesClass = [];

  var galeryItemsLength = jQuery(".wp-block-gallery img").length;
  for ($i = 0; $i < galeryItemsLength; $i++) {
    var getImageId = jQuery(".wp-block-gallery img")[$i].getAttribute(
      "data-id"
    );
    var getImageClass = jQuery(".wp-block-gallery img")[$i].getAttribute(
      "class"
    );
    imagesID.push(getImageId);
    imagesClass.push(getImageClass);
  }

  // send image id & class to "show-title.php" file
  jQuery.ajax({
    url: "show-title.php",
    type: "POST",
    data: {
      imagesID: imagesID,
      imagesClass: imagesClass,
    },
    success: function (output) {
      jQuery("body").append(output);
    },
  });
});
