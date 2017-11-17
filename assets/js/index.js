/* ============== */
/* SCROLL ANIMATE */
/* ============== */

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          }
        });
      }
    }
  }
);

/* =================== */
/* CONTACT FORM SUBMIT */
/* =================== */

$("#submit").click(function(evt){
  // prevent normal form submission
  evt.preventDefault();
  
  // initialize inputs & data object
  var inputs = document.querySelectorAll("textarea, input:not([type=submit])"),
      data = {};
  // loop through inputs adding data to 
  inputs.forEach(function(item){
    data[item.id] = item.value;
  });
  
  // SEND AJAX POST REQUEST
  $.ajax({
    method: "POST",
    url: "./assets/php/contact.php",
    data: data
  })
  .done(function(res){
    // parse response as JSON
    res = JSON.parse(res);

    // change submit button text to display response
    $("#submit").val(res.resTxt[0] || "nothing happened...");
    
    // remove/add .error class for appropriate inputs
    inputs.forEach(function(item, i){
      // add .error class if in err array
      if(res.err[item.id]) item.classList.add("error");
      // remove .error class if not in err array
      else item.classList.remove("error");
    });
    
    // check whether any data errors
    if($.isEmptyObject(res.err)){
      // change submit class on success
      $("#submit").removeClass("btn-danger").addClass("btn-success");
    } else {
      // change submit class on error
      $("#submit").removeClass("btn-success").addClass("btn-danger");
    }
  })
  .fail(function(err){
    // change submit button text to display error
    $("#submit").val("Something went wrong...");
    // change submit class on error
    
  });
});