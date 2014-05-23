/***************************************
			       APP.JS
***************************************/
// $(document).foundation(); // Init the foundation

/***************************************
        WYSIWYG-TEXTAREA 
***************************************/
tinymce.init({
  selector:'#postContent',
  toolbar: false,
  plugins: "code",
  menu : { // this is the complete default configuration
      format : {title : 'Format', items : 'bold italic underline | formats | removeformat'},
  }
});


/***************************************
            JQUERY 
***************************************/
   
jQuery(document).ready(function() {

  /***************************************
            STICKY FOOTER
  ***************************************/
   $(window).bind("load", function () {
      var footer = $("#footer");
      var pos = footer.position();
      var height = $(window).height();
      height = height - pos.top;
      height = height - footer.height();
      if (height > 0) {
          footer.css({
              'margin-top': height + 'px'
          });
      }
  });
  

	/***************************************
				FRONTEND POSTING
	***************************************/

  // Pop-up when submit
  $("#primaryPostForm").bind('ajax:complete', function() {
    alert( "Handler for .submit() called." );
         // tasks to do 


   });
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


