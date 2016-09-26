<html>
<head>
	<title>Hatchbuck Pop-Up Form Generator</title>
	<link rel="shortcut icon" href="images/icon.png" />
	<link rel="stylesheet" href="style.css" />
</head>
<body>

<?php 
include 'functions.php';

# generating navbar
echo getNav();

echo '<div id="container">';

if ((isset($_POST['hb_code'])) && ($_POST['hb_code'] != '')) {
	$button = array();

	if ((isset($_POST['form_title'])) && ($_POST['form_title'] != '')) {
		$form_title = $_POST['form_title'];
	} else {
		$form_title = 'Subscribe!';
	}

	if ((isset($_POST['button_text'])) && ($_POST['button_text'] != '')) {
		$button[text] = $_POST['button_text'];
	} else {
		$button[text] = 'Submit';
	}

	if ((isset($_POST['button_color'])) && ($_POST['button_color'] != '')) {
		$button[color] = $_POST['button_color'];
	} else {
		$button[color] = 'FFFFFF';
	}

	if ((isset($_POST['button_text_color'])) && ($_POST['button_text_color'] != '')) {
		$button[text_color] = $_POST['button_text_color'];
	} else {
		$button[text_color] = '000000';
	}

	if ((isset($_POST['tracking_code'])) && ($_POST['tracking_code'] != '')) {
		$tracking_code = $_POST['tracking_code'];
	}

	# Getting inputs
	$inputs = parseForm($_POST['hb_code']);
	# Generating new form code
	$new_form_code = createForm($form_title, $button, $inputs);
	# Getting widget code
	$widget_code = getWidget($new_form_code, $tracking_code);

	echo "<textarea id='copytext'>$widget_code</textarea>";

	# Copy and reset buttons
	echo '<br /><button class="reset" id="copy-button" onClick="Clipboard();">Copy Code</button>';
	echo '<a href="http://sandbox.hatchbuck.com/forms/popup.php"><button class="reset">Start Over</button></a>';

} else {
	echo newPaste();
}
?>

</div>
<script>
    var input  = document.getElementById("copytext");
    var button = document.getElementById("copy-button");

    button.addEventListener("click", function (event) {
        event.preventDefault();
        input.select();
        document.execCommand("copy");
    });
</script>

</body>
</html>
