<?php
declare(strict_types=1);

function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$a = 5;
$b = 8;

echo "До вызова swap(): a = $a, b = $b\n";

swap($a, $b);

echo "После вызова swap(): a = $a, b = $b\n";

if (5 === $b) {
    echo "5 === \$b: true\n";
} else {
    echo "5 === \$b: false\n";
}
?>