<?php
$quotes = [
    "Программирование учит тебя думать. Оно учит тебя справляться с проблемами, даже если поначалу они кажутся сложными. — Билл Гейтс",
    "Самая большая ошибка, которую может совершить программист, — это сдаться. — Марк Цукерберг",
    "Секрет успеха — не останавливаться на достигнутом и продолжать учиться. — Стив Джобс",
    "Учиться программировать — это как изучать новый язык. Чем больше практики, тем лучше результаты. — Ларри Пейдж",
    "Лишь настойчивость отличает успешного программиста от неудачника. — Джеймс Гослинг",
    "Не бойся пробовать новое. Самый худший код — это тот, который ты так и не написал. — Линус Торвальдс",
    "Главное в программировании — не код, а решение проблем, которые он приносит. — Грейс Хоппер",
    "Код, написанный сегодня, — это знания, которые пригодятся завтра. — Гвидо ван Россум",
    "Только в практике можно достичь совершенства. Продолжай писать код каждый день. — Дональд Кнут",
    "Думай о своих ошибках как о новых возможностях для обучения. — Эллен Сурман",
    "Программирование — это не наука, это искусство. — Билл Гейтс",
    "Секрет продуктивности — это не в том, чтобы больше работать, а в том, чтобы работать умнее. — Ларри Пейдж",
    "Когда я программирую, я не думаю о языке, я думаю о проблемах. — Мартин Фаулер"
];
function getRandom($quotes)
{
    $rand = rand(0, count($quotes) - 1);
    $quote = $quotes[$rand];

    return $quote;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <link rel="stylesheet" href="https://happyhaha.github.io/css/dist/style.min.css">
</head>
<body>

<div class="w-[1200px] pb-5">
    <div class="mt-12 ml-12 ">
        <h1 class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white">Цитата дня</h1>
        <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
            <svg class="w-8 h-8 text-gray-400 dark:text-gray-600 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
            </svg>
            <p><?php echo  getRandom($quotes); ?>/p>
        </blockquote>




    </div>
</div>





<script src="https://happyhaha.github.io/css/dist/flowbite.min.js"></script>
</body>
</html>
