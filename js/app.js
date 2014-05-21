/***************************************
			       APP.JS
***************************************/
$(document).foundation(); // Init the foundation

/***************************************
        WYSIWYG-TEXTAREA 
***************************************/
tinymce.init({
  selector:'#postContent',
  plugins: "code"
});


/***************************************
            JQUERY 
***************************************/
   
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


