<html>
<head>
	<title>Hatchbuck Form Code Stripper</title>
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
	# Getting inputs
	$inputs = parseForm($_POST['hb_code']);
	# Generating new form code
	$stripped_code = stripForm($inputs);

	echo "<textarea id='copytext'>$stripped_code</textarea>";

	# Copy and reset buttons
	echo '<br /><button class="reset" id="copy-button" onClick="Clipboard();">Copy Code</button>';
	echo '<a href="http://sandbox.hatchbuck.com/forms/strip.php"><button class="reset">Start Over</button></a>';

} else {
	echo newStrip();
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
