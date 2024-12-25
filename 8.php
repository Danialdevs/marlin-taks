<?php
session_start();
if (!isset($_SESSION['views'])) { // Если переменная сессии 'views' не установлена...
    $_SESSION['views'] = 0; // ...то создаем ее и устанавливаем значение 0
}
$_SESSION['views']++; // Увеличиваем значение переменной 'views' на 1

?>
<div class="w-[1200px] pb-5">
    <div class="mt-12 ml-12 ">
        <h1 class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white">Счетчик просмотров</h1>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Количество просмотров — <?php echo $_SESSION['views']; ?></p>
        <!-- Выводим значение переменной 'views' -->
    </div>
</div>