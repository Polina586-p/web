<?php
    $now = time();
    echo $now . "<br>";
    
    $birthday = mktime(0, 0, 0, 6, 24, 2006);
    echo $birthday . "<br>";
    
    $hour = getdate();
    $current_hour = $hour['hours'];
    echo "Текущий час: " . $current_hour . "<br>";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	
	<?php
	$welcome = "";

	if ($current_hour >= 6 && $current_hour < 12) {
	    $welcome = 'Доброе утро';
	} elseif ($current_hour >= 12 && $current_hour < 18) {
	    $welcome = 'Добрый день';
	} elseif ($current_hour >= 18 && $current_hour < 24) {
	    $welcome = 'Добрый вечер';
	} else {
	    $welcome = 'Доброй ночи';
	}
    
	echo $welcome . "<br>";
	
	setlocale(LC_ALL, 'ru_RU.UTF-8');
	echo "<br>";
	
	$formatter = new IntlDateFormatter(
        'ru_RU',
        IntlDateFormatter::FULL,
        IntlDateFormatter::MEDIUM,
        'Europe/Moscow',
        IntlDateFormatter::GREGORIAN,
        "Сегодня d MMMM y 'года', eeee HH:mm:ss"
    );
    echo $formatter->format(time()) . "<br>";
	
    $today = new DateTime();
    
    $nextBirthday = new DateTime();
    $nextBirthday->setTimestamp($birthday);

    $nextBirthday->setDate($today->format('Y'), $nextBirthday->format('m'), $nextBirthday->format('d'));

    if ($today > $nextBirthday) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $today->diff($nextBirthday);
    $days = $interval->days;
    $hours = $interval->h;
    $minutes = $interval->i;
    $seconds = $interval->s;
    
    echo "До моего дня рождения осталось: $days дней, $hours часов, $minutes минут, $seconds секунд";
    ?>
</body>
</html>
