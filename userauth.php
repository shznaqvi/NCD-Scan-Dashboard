<?php
class UserAuth {
    private const TAG = "UserAuth";
    private const PBKDF2_NAME = "PBKDF2WithHmacSHA1";
    private const HASH_BYTE_SIZE = 16;
    private const SALT_BYTE_SIZE = 16;
    private const ITERATIONS = 1000;

    public static function generatePassword($password, $oldsalt) {
        $chars = str_split($password);

        $salt = $oldsalt ? $oldsalt : self::getSalt();
		

        //$spec = new PBEKeySpec($chars, $salt, self::ITERATIONS, self::HASH_BYTE_SIZE * 8);
		$spec = hash_pbkdf2("sha1", $password, $salt, self::ITERATIONS, self::HASH_BYTE_SIZE * 8, true);

		$hash = base64_encode($spec);
        $salt_hash = $salt.$hash;

        return base64_encode($salt_hash);
    }

    public static function checkPassword($password, $oldPassword) {
				$salt = substr(base64_decode($oldPassword), 0, self::SALT_BYTE_SIZE);
echo(base64_encode($salt));
        $genPass = self::generatePassword($password, $salt);
        return $genPass === $oldPassword;
    }

    private static function getSalt() {
        $salt = random_bytes(self::SALT_BYTE_SIZE);
        return $salt;
    }
}

// Usage
$password = "password2"; // New password to check
$oldPassword = "ni1uSHv83fen67umTfPqSU4L"; // Old stored password hash

try {
    if (UserAuth::checkPassword($password, $oldPassword)) {
        echo "Password is correct!";
    } else {
        echo "Password is incorrect.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}


function genPassword($password)
{
    $key_length = 16;
    $saltSize = 16;
    $iterations = 1000;
    $salt = random_bytes(16);
	
    if (!isset($algorithm) || $algorithm == '') {
        $algorithm = 'sha1'; // sha1 OR sha512
    }

    $output = hash_pbkdf2(
        $algorithm,
        $password,
        $salt,
        $iterations,
        $key_length / 8,
        true // IMPORTANT
    );

    return base64_encode($salt . $output);
}

    $passwordEnc = genPassword($_POST["password"]);
echo "Gen: ".$passwordEnc

?>
