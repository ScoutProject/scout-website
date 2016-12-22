<?php
include_once "../php/checkLogin.php";
$page = "/award-scheme/";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Award Scheme - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/award-scheme.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<?php include '../includes/modals.php' ?>
		<main>
			<div id="award_scheme_container">
				<?php
				if (!function_exists("callAPI")) {
					function callAPI($method, $url, $data = false, $user = false, $pass = false) {
						$curl = curl_init();

						switch ($method)
						{
							case "POST":
								curl_setopt($curl, CURLOPT_POST, 1);

								if ($data)
									curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
								break;
							case "PUT":
								curl_setopt($curl, CURLOPT_PUT, 1);
								break;
							default:
								if ($data)
									$url = sprintf("%s?%s", $url, http_build_query($data));
						}

						// Optional Authentication:
						if ($user && $pass) {
							curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
							curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
						}

						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

						$result = curl_exec($curl);

						curl_close($curl);

						return $result;
					}
				}
				$result = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/levels');
				$result = json_decode($result, true);
				
				for ($i = 0; $i < count($result); $i++) {
				?>
				<div class="award_scheme_level level<?php echo $result[$i]['level_id']; ?>">
					<a class="award_scheme_level_title" href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($result[$i]['level'])); ?>/" onclick="return openLevel(this, <?php echo $result[$i]['level_id']; ?>);"><?php echo $result[$i]['level']; ?></a>
					<svg class="award_scheme_level_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
					<div class="award_scheme_sublevel_container">
						<?php
						$subresult = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/levels/' . $result[$i]['level_id']);
						$subresult = json_decode($subresult, true);
						
						for ($j = 0; $j < count($subresult); $j++) {
						?>
						<a class="award_scheme_sublevel" href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($result[$i]['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($subresult[$j]['sublevel'])); ?>/"><?php echo $subresult[$j]['sublevel']; ?></a>
						<?php
						}
						?>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
		<script src="/js/award-scheme.js"></script>
	</body>
</html>