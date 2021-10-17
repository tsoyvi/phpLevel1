<?php
///////// Вывод ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);
///////////////////////

echo '1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка. <br><br>';

function divisionBy3()
{
    $i = 0;
    while ($i <= 100) {
        if (($i % 3) == 0) {
            echo $i . ' ';
        }
        $i++;
    }
}

divisionBy3();

echo '<hr>';



echo '2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:<br>
0 – ноль.<br>
1 – нечетное число.<br>
2 – четное число.<br>
3 – нечетное число.<br>
…<br>
10 – четное число.<br><br>';

function evenNotEven()
{
    $i = 0;
    do {
        if ($i == 0) {
            echo '0 – ноль.<br>';
        } elseif (($i % 2) != 0) {
            echo $i . ' - нечетное число.<br>';
        } else {
            echo $i . ' - четное число.<br>';
        }

        $i++;
    } while ($i <= 10);

};

evenNotEven();

echo '<hr>';



echo ' 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями<br>
городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:<br>
Московская область:<br>
Москва, Зеленоград, Клин<br>
Ленинградская область:<br>
Санкт-Петербург, Всеволожск, Павловск, Кронштадт<br>
Рязанская область … (названия городов можно найти на maps.yandex.ru)<br><br>';

$arrArea = [];
$arrArea['Московская область'] = ['Москва', 'Зеленоград', 'Клин'];
$arrArea['Ленинградская область'] = ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'];
$arrArea['Рязанская область'] = ['Рязань', 'Сасово', 'Спас-Клепики', 'Шацк'];
$arrArea['Свердловская область'] = ['Екатеринбург', 'Нижний Тагил', 'Каменск-Уральский', 'Первоуральск', 'Серов'];
$arrArea['Челябинская область'] = ['Челябинск', 'Бакал', 'Коркино', 'Сатка', 'Южноуральск', 'Сим'];
$arrArea['Краснодарский край'] = ['Анапа', 'Армавир', 'Геленджик', 'Краснодар', 'Лабинск', 'Сочи'];

function arrAreaList($arrArea)
{
    foreach ($arrArea as $area => $citiesArr) {
        echo '<b>' . $area . '</b>: <ul>';
        foreach ($citiesArr as $city) {
            echo '<li>' . $city . '</li>';
        }
        echo '</ul>';
    }
}

arrAreaList($arrArea);

echo '<hr>';



echo '4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания <br>
(‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).<br>
Написать функцию транслитерации строк.<br><br>';

$lettersTranscript = array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y',
    'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f',
    'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => '', ' ' => ' ');

function translitString($string)
{
    global $lettersTranscript;
    $str = '';
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $str .= $lettersTranscript[mb_substr($string, $i, 1)];
    }
    return $str;
}

echo translitString('тест слов на транскрипт');

echo '<hr>';



echo '5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.<br><br>';

function removeSpacesInString($string)
{
    return str_replace(" ", "_", $string);
}

echo removeSpacesInString('тест слов на транскрипт');

echo '<hr>';



echo '6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом.
Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.<br><br>';

$arrMenu['Мероприятия'] = ['https://gb.ru/events',
    'Карьерный план' => 'https://courses/careerplan',
    'Путь в IT' => 'it_dao',
    'Востребованный специалист' => 'https://masterclass',
    'Карьерная мастерская' => 'https://career-masterskaya',
    'Веб-дизайнер' => 'https://webinar/earning-designer',
    'Личные консультации' => 'https://courses/personal-consultation',
    'Карьера руководителя' => 'https://courses/leader',
    'Путь новичка' => 'https://start_digital',
];

$arrMenu['База знаний'] = [
    'gb.ru',
    'Форум' => '/topics',
    'Путь в IT' => 'it_dao',
    'Истории успеха' => '/posts/success_story',
    'Карьерная мастерская' => '/career-masterskaya',
];

$arrMenu['Карьера'] = [
    'gb.ru',
    'Трудоустройство' => '/career',
    'Компании' => '/career?q=&amp;filters%5Btype%5D=Компании',
    'Вакансии' => '/career',
    'Путь в ИТ' => '/career-masterskaya',
];

$arrMenu['Помощь'] = [
    'gb.ru',
];

function showMenu($arrMenu)
{
    echo '<ul>';
    foreach ($arrMenu as $menu => $arrSubMenu) {
        echo '<li><b><a href="' . $arrSubMenu[0] . '">' . $menu . '</a></b><ul>';
        foreach ($arrSubMenu as $subMenu => $link) {
            if ($subMenu == 0) {continue;}
            echo '<li><a href="' . $link . '">' . $subMenu . '</a></li>';
        }
        echo '</li></ul>';
    }
    echo '</ul>';
}

showMenu($arrMenu);

echo '<hr>';



echo '7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
for (…){ // здесь пусто}<br><br>';

for ($i = 0; $i < 10;print $i++) {
    // здесь пусто
}

echo '<hr>';



echo '8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».<br><br>';

function arrAreaListByLetter($arrArea, $letter)
{
    foreach ($arrArea as $area => $citiesArr) {
        echo '<b>' . $area . '</b>: <ul>';
        foreach ($citiesArr as $city) {
            if (mb_substr($city, 0, 1) != $letter) {continue;}
            echo '<li>' . $city . '</li>';
        }
        echo '</ul>';
    }
}

arrAreaListByLetter($arrArea, 'К');

echo '<hr>';



echo '9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов
на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах). <br><br>';

// можно так ))
// echo removeSpacesInString(translitString('тест слов на транскрипт'));

// или собрать избыточную из двух
function translitRemoveSpacesInString($string)
{
    global $lettersTranscript;
    $str = '';
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $str .= $lettersTranscript[mb_substr($string, $i, 1)];
    }
    return str_replace(" ", "_", $str);
}

echo translitRemoveSpacesInString('тест слов на транскрипт');
