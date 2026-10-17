<?php

$constants = get_defined_constants(true);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Constants</title>
</head>

<body>
    <h1>Определённые константы в PHP<\h1>;
<?php

foreach ($constants as $category => $category_constants) {
    echo "<div class='category'>";
    echo "<h2>Категория: " . htmlspecialchars($category) . " (" . count($category_constants) . " констант)</h2>";
    
    foreach ($category_constants as $name => $value) {
        echo "<div class='constant'>";
        echo "<span class='name'>" . htmlspecialchars($name) . "</span> = ";
        echo "<span class='value'>";
        
        if (is_bool($value)) {
            echo $value ? 'true' : 'false';
        } elseif (is_null($value)) {
            echo 'null';
        } elseif (is_array($value)) {
            echo 'Array(' . count($value) . ')';
        } elseif (is_object($value)) {
            echo 'Object(' . get_class($value) . ')';
        } elseif (is_string($value)) {
            echo "'" . htmlspecialchars($value) . "'";
        } else {
            echo htmlspecialchars((string)$value);
        }

        echo "</span>";
        
        echo "</div>";
    }
   
    echo "</div>";
}
?>
</body>
</html>