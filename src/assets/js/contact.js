$("#submit").click(function (evt) {
	// prevent normal form submission
	evt.preventDefault();

	// initialize inputs & data object
	var inputs = document.querySelectorAll("textarea, input:not([type=submit])"),
		data = {};
	// loop through inputs adding data to 
	inputs.forEach(function (item) {
		data[item.id] = item.value;
	});

	// SEND AJAX POST REQUEST
	$.ajax({
			method: "POST",
			url: "./assets/php/contact.php",
			data: data
		})
		.done(function (res) {
			// parse response as JSON
			res = JSON.parse(res);

			// change submit button text to display response
			$("#submit").val(res.resTxt[0] || "nothing happened...");

			// remove/add .error class for appropriate inputs
			inputs.forEach(function (item, i) {
				// add .error class if in err array
				if (res.err[item.id]) item.classList.add("error");
				// remove .error class if not in err array
				else item.classList.remove("error");
			});

			// check whether any data errors
			if ($.isEmptyObject(res.err)) {
				// change submit class on success
				$("#submit").removeClass("btn-danger").addClass("btn-success");
			} else {
				// change submit class on error
				$("#submit").removeClass("btn-success").addClass("btn-danger");
			}
		})
		.fail(function (err) {
			// change submit button text to display error
			$("#submit").val("Something went wrong...");
			// change submit class on error

		});
});