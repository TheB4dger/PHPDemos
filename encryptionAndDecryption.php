<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PHP Encryption/Decryption test</title>
  <meta name="author" content="Ben Moorhouse">
  <meta name="description" content="PHP Encryption/Decryption test">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body style="font-family: Montserrat">
<h1>Public/Private Key Encryption</h1>
<?php

	// Setup
	$config = array(
		"digest_alg" => "sha512",
		"private_key_bits" => 4096,
		"private_key_type" => OPENSSL_KEYTYPE_RSA
		);

	// Generate a key pair
		$res = openssl_pkey_new($config);
		openssl_pkey_export($res, $privKey);
		$pubKey = openssl_pkey_get_details($res);
		$pubKey = $pubKey["key"];

		echo "<h2>Generated Keys</h2>";
		echo "<h3>Private Key</h3> <p>$privKey</p>";
		echo "<h3>Public Key</h3> <p>$pubKey</p>";

	// Add a message
		$data = "This is the data that I'd like to keep secret.";
		echo "<h2>Messages</h2>";
		echo "<h3>Original</h3> <p>$data</p>";

	// Encrypt a message with the private key
		openssl_private_encrypt($data, $encrypted, $privKey);
		// display it
			echo "<h3>Encrypted</h3> <p>$encrypted</p>";

	// Decrypt the encrypted message with the public key
		openssl_public_decrypt($encrypted, $decrypted, $pubKey);
		// display it
			echo "<h3>Decrypted</h3> <p>$decrypted</p>";
?>
		</ul>
	</body>
</html>