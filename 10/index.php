<?php
require_once 'db.php';
session_start();
$expenses = $pdo->query("SELECT * FROM expenses")->fetchAll();

function totalAmount($expenses)
{
    $total = 0;
    foreach ($expenses as $expense) {
        $total += $expense['amount']; // Суммируем значения расходов
    }
    return $total;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <link rel="stylesheet" href="https://happyhaha.github.io/css/dist/style.min.css">
    <!-- <link rel="stylesheet" href="./css/output.css"> -->
</head>
<body>
<h1 class="max-w-full mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white text-center">Калькулятор расходов</h1>

<?php if(isset($_SESSION['success'])) {
    echo '<div class="w-[600px] mx-auto p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    Действие выполнено успешно.
</div>';
    unset($_SESSION['success']);
}
?>

<?php if(isset($_SESSION['error'])) {
    echo '<div class="w-[600px] mx-auto p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    Ошибка.
</div>';
    unset($_SESSION['error']);
}
?>


<div class="w-[1200px] mt-6 mx-auto flex justify-around">
    <div class="mb-5 w-[300px]">

        <form class="" METHOD="post" action="create.php">
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название расхода</label>
                <input type="text" name="name" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Сумма</label>
                <input type="number" name="amount" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить расход</button>
        </form>
    </div>
    <div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Название расхода
                </th>
                <th scope="col" class="px-6 py-3">
                    Сумма
                </th>
                <th scope="col" class="px-6 py-3">
                    Действия
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($expenses as $expense) : ?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <?= $expense['name'] ?>
                </th>
                <td class="px-6 py-4">
                    $<?= $expense['amount'] ?>
                </td>
                <td class="px-6 py-4">
                    <form method="post" action="delete.php">
                        <input value="<?= $expense["id"]?>" name="id" style="display: none">
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Удалить</button>

                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-black text-gray-900 whitespace-nowrap dark:text-white">
                    Итого
                </th>
                <td class="px-6 py-4 font-black text-black">
                    <?=  totalAmount($expenses); ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>





    <script src="https://happyhaha.github.io/css/dist/flowbite.min.js"></script>
</body>
</html>