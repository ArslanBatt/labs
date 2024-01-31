<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="style.css">
<style>
.libro{
    border-radius: 25px;
    padding: 5px 15px 5px 15px;
    background: black;
    color: white;
}
.inputss{
    border-radius: 25px;
    padding: 5px 15px 5px 15px;
    background: black;
    color:white;
}
body{
    background: #d7e0e6;
}
.regist{
    border-radius: 50px;
    padding: 5px 15px 5px 15px;
    background: aliceblue;
}
.h1s{
    display: flex; 
    justify-content: center;
}
</style>
</head>
<body>
<div class="header" style="gap: 28%;">
<div class="header-div1">
    <p>Тренировочные задания по ЕГЭ</p>
    <h1>ИНФОРМАТИКА</h1>
    <p>Тольятинский государственный университет</p>
</div>
<div class="header-div2">
    <p>Вы вошли на сайт как гость</p>
    <input class="regist" type="button" value="Войти" placeholder="">
    <input class="regist" type="button" value="Зарегистрироваться" placeholder="">
</div>
</div>
<div class="body">
<div class="date">
        <p id="timer">00:00:00
        </p>
        <?php print(date( "l dS of F Y h:i:s A" )); ?>
</div>
<div class="task-text">
    <form action="">
        <h1 class="h1s">Билет 1. Вычисление количества вариантов</h1>
        <div>
            <p>1.  Переведи из двоичной системе счисления в десятиричную систему счисления.</p>
            <label for=""><a href="/task.php?task=0"><input class="libro" type="button" value="Примеры"></label></a>
        </div>
        <div>
            <p>2. Какой минимальный объём памяти (в Кбайт) нужно зарезервировать, чтобы можно было сохранить любое растровое изображение размером 128×128 пикселей при условии, что в изображении могут использоваться n-ое количество различных цветов? В ответе запишите только целое число, единицу измерения писать не нужно.</p>
            <label for=""><a href="/task.php?task=1"><input class="libro" type="button" value="Примеры"></label></a>              
        </div>
        <div>
            <p>3. Подсчет количества вхождений рандомного символа
            </p>
            <label for=""><a href="/task.php?task=2"><input class="libro" type="button" value="Примеры"></label></a>
        </div>
        <div class="submit">
        </div>
        <div class="submit">
            <label for=""><input class="inputss" type="button" id="refreshButton" onclick="location.reload()" value="Пример решения"></label>
            <label for=""><input class="inputss" type="submit"></label>
        </div>
    </form>
</div>
</div>
<script>
let interval;

let seconds = 0;
let minutes = 0;
let hours = 0;

function startTimer() {
interval = setInterval(updateTimer, 1000);
}
function stopTimer() {
clearInterval(interval);
}

function updateTimer() {
seconds++;
if (seconds >= 60) {
seconds = 0;
minutes++;
if (minutes >= 60) {
minutes = 0;
hours++;
}
}

document.getElementById("timer").innerText =
(hours < 10 ? "0" + hours : hours) + ":" +
(minutes < 10 ? "0" + minutes : minutes) + ":" +
(seconds < 10 ? "0" + seconds : seconds);
}

startTimer(); // Автоматически запустить таймер при загрузке страницы
</script>
</body>
</html>