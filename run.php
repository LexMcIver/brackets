<?php
use Space\BracketsValidator;

if ($argc !== 2) {
    echo "Пожалуйста укажите аргумент\n";
    echo "Пример: php run.php '<строка>'\n";
    exit(1);
}

$expression = $argv[1];
$bracketsValidator = new BracketsValidator();

if ($bracketsValidator->isValid($expression)) {
    echo "Скобки расставлены верно\n";
} else {
    echo "Скобки расставлены некорректно\n";
}
