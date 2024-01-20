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
        .header{
            gap: 28%;
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
    <div class="header">
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
        <?php

$var1 = 0;
$var2 = 0;
$var3 = 0;
$var4 = 0;
$var5 = 0;
$var6 = 0;

$tasks = [
    "Необходимо перевести значение $var1 из 2 сисемы счисления в 10 систему счисления. В качестве ответа указать число.",
    "Какой минимальный объём памяти (в Кбайт) нужно зарезервировать, 
    чтобы можно было сохранить любое растровое изображение размером $var2 × $var3 пикселей при условии, 
    что в изображении могут использоваться $var4 различных цветов? В ответе запишите только целое число, единицу измерения писать не нужно.",
    "Напишите количество вхождений символа $var5 в следующем тексте. В ответ записать число вхождений. $var6"
];

function random($min, $max){
    return mt_rand($min, $max);
}
function get2SS($len){
    $str="";
    for($i=0;$i<$len;$i++){
        if($i==0) $str.=1;
        else $str.=random(0,1);
    }
    return $str;
}
function get_answer($var1) {
    $binaryDigits = str_split($var1);
    $decimalNumber = 0;
    for ($i = 0; $i < count($binaryDigits); $i++) {
        $decimalNumber += intval($binaryDigits[$i]) * pow(2, count($binaryDigits) - 1 - $i);
    }
    return $decimalNumber;
}
for($i=0;$i<4;$i++){
    switch($_GET['task']){
        case 0;
        $var1 = get2SS(random(2,5));
        echo "<p>Необходимо перевести значение $var1 из 2 сисемы счисления в 10 систему счисления. В качестве ответа указать число.</p>";
        echo "<input type='hidden' value='" . get_answer($var1) . "' id='ans$i'>";
        echo "<label>Ответ:</label><input type='number' id='ans_user$i'>";
        echo "<p id='val$i'></p><hr>";
        break;
    }
}


function getColor($tlen){ 
    $str=""; 
    $digits = array(128, 256, 16); 
    for($i=0; $i < $tlen; $i++){ 
        if($i == 0) {
            $str .= $digits[array_rand($digits, 1)]; 
        } else {
            $str .= $digits[array_rand($digits, 1)]; 
        }
    } 
    return $str; 
}
function calculateMemorySize($var2, $var3, $var4) {
    $bitsPerPixel = ceil(log($var4, 2)); // вычисляем количество бит на пиксель
    $memorySize = $var2 * $var3 * $bitsPerPixel / 8 / 1024; // вычисляем объем памяти в Кбайтах
    return ceil($memorySize); // округляем до ближайшего целого числа
}
$memorySize = calculateMemorySize($var2, $var3, $var4);
for($i=0; $i<4; $i++){ 
    switch($_GET['task']){ 
        case 1: 
            $var2 = getColor(rand(1, 1)); 
            $var3 = getColor(rand(1, 1)); 
            $var4 = getColor(rand(1, 1)); 
            echo "<p>Какой минимальный объём памяти (в Кбайт) нужно зарезервировать, чтобы можно было сохранить любое растровое изображение размером $var2 × $var3 пикселей при условии, что в изображении могут использоваться $var4 различных цветов? В ответе запишите только целое число, единицу измерения писать не нужно.</p>"; 
            echo "<input type='hidden' value='" . calculateMemorySize($var2, $var3, $var4) . "' id='ans$i'>";
            echo "<label>Ответ:</label><input type='number' id='ans_user$i'>";
            echo "<p id='val$i'></p><hr>";
            break; 
    } 
}


function getRandomText() {
    $texts = array(
        "<br>Я вас любил: любовь еще, быть может,
        <br>В душе моей угасла не совсем;
        <br>Но пусть она вас больше не тревожит;
        <br>Я не хочу печалить вас ничем.
        <br>Я вас любил безмолвно, безнадежно,
        <br>То робостью, то ревностью томим;
        <br>Я вас любил так искренно, так нежно,
        <br>Как дай вам Бог любимой быть другим.<br>",
        "<br>Сижу за решеткой в темнице сырой.
        <br>Вскормленный в неволе орел молодой,
        <br>Мой грустный товарищ, махая крылом,
        <br>Кровавую пищу клюет под окном,
        <br>Клюет, и бросает, и смотрит в окно,
        <br>Как будто со мною задумал одно.
        <br>Зовет меня взглядом и криком своим
        <br>И вымолвить хочет: «Давай улетим!
        <br>Мы вольные птицы; пора, брат, пора!
        <br>Туда, где за тучей белеет гора,
        <br>Туда, где синеют морские края,
        <br>Туда, где гуляем лишь ветер… да я!..»<br>",
        "<br>Уж небо осенью дышало,
        <br>Уж реже солнышко блистало,
        <br>Короче становился день,
        <br>Лесов таинственная сень
        <br>С печальным шумом обнажалась,
        <br>Ложился на поля туман,
        <br>Гусей крикливых караван
        <br>Тянулся к югу: приближалась
        <br>Довольно скучная пора;
        <br>Стоял ноябрь уж у двора.<br>",
        "<br>В тот год осенняя погода
        <br>Стояла долго на дворе,
        <br>Зимы ждала, ждала природа.
        <br>Снег выпал только в январе
        <br>На третье в ночь. Проснувшись рано,
        <br>В окно увидела Татьяна
        <br>Поутру побелевший двор,
        <br>Куртины, кровли и забор,
        <br>На стеклах легкие узоры,
        <br>Деревья в зимнем серебре,
        <br>Сорок веселых на дворе
        <br>И мягко устланные горы
        <br>Зимы блистательным ковром.
        <br>Все ярко, все бело кругом.<br>"
    );
    $randomIndex = array_rand($texts); // Получаем случайный индекс из массива
    return $texts[$randomIndex]; // Возвращаем случайный текст
}
function randomRussianLetter() {
    $letters = "абвгдеёжзийклмнопрстуфхцчшщъыьэюя";
    $randomIndex = rand(0, mb_strlen($letters, 'utf-8') - 1);
    return mb_substr($letters, $randomIndex, 1, 'utf-8');
}
for($i=0;$i<4;$i++){   
    switch($_GET['task']){   
        case 2:   
            $var5 = randomRussianLetter();   
            $var6 = getRandomText();
            $count = mb_substr_count($var6, $var5, 'utf-8');
            echo "<p>Напишите количество вхождений символа '$var5' в следующем тексте. В ответ записать число вхождений. <br> $var6</p>";   
            echo "<input type='hidden' value='" . mb_substr_count($var6, $var5, 'utf-8') . "' id='ans$i'>";
            echo "<label>Ответ:</label><input type='number' id='ans_user$i'>";
            echo "<p id='val$i'></p><hr>";
            break;   
    }   
}
?>
<div class="submit">
                    <label for="refreshButton"><input 
                    style="border-radius: 25px;
                          padding: 5px 15px 5px 15px;
                          background: black;
                          color:white"
                    type="button" id="refreshButton" onclick="location.reload()" value="Пример решения"></label>
                    <label onclick="click" for="redirectButton"><input
                    style="border-radius: 25px;
                          padding: 5px 15px 5px 15px;
                          background: black;
                          color:white"
                    type="button" id="btn" onclick="click" value="Отправить"></label>
                </div>
        </div>
    </div>

    <script>
let btn = document.getElementById("btn");

btn.addEventListener("click", () => {
for (let i = 0; i < 4; i++) {
let ans = document.getElementById(`ans${i}`).value;
let ans_user = document.getElementById(`ans_user${i}`).value;
let val = document.getElementById(`val${i}`);
val.innerText = `Правильный ответ: ${ans}`;
if (ans == ans_user)
val.style.color = "green";
else
val.style.color = "red";
}
});

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