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

$("#form [type='submit']").click(function(evt){
  // prevent normal form submission
  evt.preventDefault();
  
  // initialize data set
  var data = {
    name:   $("#form [name='name']").val(),
    email:  $("#form [name='email']").val(),
    msg:    $("#form [name='msg']").val(),
    robot:  $("#form [name='robot']").val()
  };
  
  /* ERROR HANDLE */
  // check all inputs filled in
  // check appropriate email format
  // check user not a robot
  
  /* SEND POST VIA AJAX*/
  $.ajax({
    method: "POST",
    url: "./assets/php/contact.php",
    dataType: "json",
    data: JSON.stringify(data)
  })
  .done(function(data){
    alert(data);
  })
  .fail(function(){
    alert("failure");
  });
});