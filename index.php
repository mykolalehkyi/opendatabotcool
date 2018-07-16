<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>OpenDataBot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="http://localhost/opendata/libs/jquery.js"></script>
    <script src="http://localhost/opendata/libs/popper.js"></script>
    <link rel="stylesheet" href="http://localhost/opendata/libs/bootstrap.css">
    <script src="http://localhost/opendata/libs/bootstrap.js"></script>
    <script defer src="http://localhost/opendata/libs/font-awesome.js"></script>
    <link rel="stylesheet" href="http://localhost/opendata/css/style.css">

</head>
<body class="bg-light">
	
	<?php 

		$code = $_GET["code"];

		// $url = "https://opendatabot.com/api/v1/company/".$code."?apiKey=Nb78bSymFmFK";
		$url = "http://localhost/opendata/data.json";
		$json = json_decode(file_get_contents($url), true);

	?>

	<br><br>
	<div class="container">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<form action="" id="form">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">#</div>
						</div>
						<input type="text" class="form-control" placeholder="Company Code" name="code">
					</div>	

					<button class="form-control btn btn-light" id="btn">Search</button>
				</form>
			</div>
			<div class="card-body">
				
				<?php 
					
					foreach ($json as $key => $value) {
						switch ($key) {
							case 'heads':
							case 'activities':		
							case 'beneficiaries':
							case 'audits':
								echo "$key:<br>";
								for ($i=0; $i < count($value); $i++) { 
									foreach ($value[$i] as $keyin => $valuein) {
										echo "> $keyin : $valuein <br>";
									}
									if ($i != count($value) - 1) {
										echo "---<br>";
									}
								}

								break;

							case 'history':
								echo "$key:<br>";
								print_r($value);echo "<br>";

								for ($i=0; $i < count($value); $i++) { 


									echo "> date : ".$value[$i]["date"];

									if ($i != count($value) - 1) {
										echo "---<br>";
									}
								}
								break;

							case 'warnings':
								echo "$key:<br>";

								break;

							case 'licenses':
								echo "$key:<br>";

								break;
							
							default:
								echo $key.": ".$value."<br>";
								break;
						}
					}

				?>

			</div>
		</div>
	</div>

</body>
</html>

