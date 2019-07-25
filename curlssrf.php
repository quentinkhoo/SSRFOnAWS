<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// check if argument is a valid URL
	if(filter_var($_POST["url"], FILTER_VALIDATE_URL)) {
		// parse URL
		$r = parse_url($_POST["url"]);
		//print_r($r);
		// check if host ends with google.com
		if(preg_match('/wttr/', $r["host"])) {
			// get page from URL
			echo "Curling ". $_POST["url"];
			exec('curl "'.$r["host"].'"', $urlArray);
			echo '<pre>';
			print_r($urlArray);
			echo '</pre>';

		} else {
			$url_error = "Error: Not wttr URL?";
		}
	} else {
		$url_error = "Error: Invalid URL";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ASCII Art</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
body{ font: 14px sans-serif; }
.wrapper{ width: 350px; padding: 20px; }
</style>
</head>
<body>
<div class="wrapper">
<h2>Weather Report</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($url_error)) ? 'has-error' : ''; ?>">
<label>Get weather information!</label>
<select name="url" class="form-control" value="<?php echo $url; ?>">
	<option value="https://wttr.in">Singapore</option>
	<option value="https://wttr.in/Moon">Moon</option>
	<option value="0://169.254.169.254:80;wttr.in:80">Metadata Service</option>
</select>
<span class="help-block"><?php echo $url_error; ?></span>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
</div>
</form>
</div>
</body>
</html>
