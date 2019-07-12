<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*Регулярные выражения
1. Написать регулярку для проверки Является ли строка числом, длиной до 5 цифр
2. Заменить все повторяющиеся пробелы в тексте на один
3. Найти текст, заключенный в какой-то тег, например <TITLE> ... </TITLE> из HTML-файла и вывести
данный текст.
4. Написать форму регистрации пользователей с обязательными полями: логин (длина поля не более 15
символов), пароль(не меньше 8 символов, можно использовать буквы английского и русского алфавита,
-,_ и цифры), e-mail и информация о себе. В обработчике формы сделать обработку данных полей на
валидность и в тексте “информация о себе” заменить все заглавные буквы на прописные с помощью
регулярки.*/

$text = "В 1995 году      датский  программист  (ныне живущий в Канаде)  Расмус Лердорф  (Rasmus Lerdorf)   создал набор 
скриптов  на Perl/CGI  для  вывода и  учёта    посетителей его онлайн-резюме,    обрабатывающий шаблоны HTML-документов";
$text2 = 2019;

if(preg_match('/^[0-9]{4}$/', $text2, $matches) === 1) {
    echo 'Эта строка начинается с числа '. '\''.$matches[0]. '\''.' длиной до 5 цифр.'."<br>";
}else {
    echo "Эта строка не начинается с числа длиной до 5 цифр."."<br>";
}
//$text = str_replace(" ", "&nbsp;",$text);
//echo $text.'<\br>';

$a = preg_replace ( '/\s{2,}/' , ' ' , $text,  -1, $count);
if($a === true){
    echo '1';
}

echo " Строка после преобразования: \" {$text}.\" <br> Количество удаленых пробелов: {$count}."."<br>";

$text3 = file_get_contents (realpath ( 'forma.php' ));

$text_title = preg_match ( '/<title>(.*)<\/title>/Uis', $text3,$title);
echo $title[1];

