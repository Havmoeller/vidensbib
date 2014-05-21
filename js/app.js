/***************************************
			APP.JS
***************************************/
$(document).foundation({
  equalizer : {
    // Specify if Equalizer should make elements equal height once they become stacked.
    equalize_on_stack: true
  }
});


jQuery(document).ready(function() {

	/***************************************
				FRONTEND POSTING
	***************************************/

 	// Init the validation for Frontend posting
    jQuery("#primaryPostForm").validate({
    	messages: {
    	  postTitle: "Husk lige at angiv en overskrift",
    	  postCategory: "Vælg en kategori",
    	  postContent: "Skriv lige hvordan du gjorde",
        postTag: "Smid et par tags på, så du kan finde den igen"
    	}
    }); 
 	
 	// Hide the Frontend posting form
 	$("#newPost").hide();

 	// Show posting form when onClick
 	$("#newPostButton").click(function() {
  		$("#newPost").show("fast");
	});
	 	// Show posting form when onClick
 	$("#hidePostButton").click(function() {
  		$("#newPost").hide("fast");
	});



});


