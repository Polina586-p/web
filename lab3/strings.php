<?php

$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';

?>

<?php

	$login = trim($login);
	$login = strtolower($login);
	$login = strtoupper($login);

	function checkPasswordStrength(string $password): bool {
		
		if (strlen($password) < 7) {
			return false;
		}
		
		if (!preg_match('/[A-Z]/', $password)) {
			return false;
		}

		if (!preg_match('/[a-z]/', $password)) {
			return false;
		}

		if (!preg_match('/[0-9]/', $password)) {
			return false;
		}
		
		return true;
	}

	$isPasswordStrong = checkPasswordStrength($password);
	

	$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
	

	$isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
	
    echo "Обработанный логин: '$login'<br>";
    echo "Пароль сложный: " . ($isPasswordStrong ? 'да' : 'нет') . "<br>";
    echo "Обработанное имя: $name<br>";
    echo "Email корректный: " . ($isEmailValid ? 'да' : 'нет') . "<br>";
    echo "Код: " . htmlspecialchars($code) . "<br>";
?>

</body>
</html>