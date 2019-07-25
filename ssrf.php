<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// check if argument is a valid URL
	if(filter_var($_POST["url"], FILTER_VALIDATE_URL)) {
		$curl_object = curl_init();

		curl_setopt($curl_object, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($curl_object, CURLOPT_URL, $_POST["url"]);

		$result = curl_exec($curl_object);
		
		echo $result;

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
	<option value="http://169.254.169.254/latest/meta-data/iam/security-credentials/EC2FullAccessS3">Metadata Service</option>
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
