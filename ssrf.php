<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// check if argument is a valid URL
	if(filter_var($_POST["url"], FILTER_VALIDATE_URL)) {
		// parse URL
		//$r = parse_url($_POST["url"]);
		print_r($r);
		// check if host ends with google.com
		if(preg_match('/artscene\.textfiles\.com/', $_POST["url"])) {
			// get page from URL
			echo "Curling ". $_POST["url"];
			exec('curl "'.$_POST["url"].'"', $urlArray);
			echo '<pre>';
			print_r($urlArray);
			echo '</pre>';

		} else {
			$url_error = "Error: Host not allowed";
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
<h2>Query a URL</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($url_error)) ? 'has-error' : ''; ?>">
<label>Get Some ASCII Art!</label>
<select name="url" class="form-control" value="<?php echo $url; ?>">
	<option value="http://artscene.textfiles.com/asciiart/barney.txt">Barney</option>
	<option value="http://artscene.textfiles.com/asciiart/cow.txt">Cows</option>
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
