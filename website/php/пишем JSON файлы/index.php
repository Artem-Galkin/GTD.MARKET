<?php
// https://www.youtube.com/watch?v=LLljLBWO6ac&list=PLM7wFzahDYnHdnEp8Nn_jD_jxYaWLnsyG&index=12


// =================================проверить валидность файла JSON----------------------
// https://jsonformatter.org/#
//-------------------читать JSON файлы--------------------------
$res = file_get_contents('s.json'); // переменная куда будет считыватьмя JSON файл. И нам надо указать путь к файлу
print_r($res); // выводим на экран наш объект
echo "<br>";
$data = json_decode($res, true); // Чтение JSON файла происходит ввиде строки, а работать нам хочется с массивом - строку $S преобразовываем в массив. 
// var_dump($data); // позволяет преобразовать строку в ассоциативный массив
for ($i=0; $i < count($data); $i++) { // преобразоваваем данные внутри файла.
  $data[$i]['age'] = $data[$i]['age']+10; // преобразовать данные - изменяем возраст внутри JSON файла
}

print_r($data);

// write json
$jsonData = json_encode($data); // Записываем массив с измененными данными обратно в массив в JSON файл. Для этого преобразоваем наш массив в строку
file_put_contents('2.json',$jsonData); // Мы получили JSON строкую, теперь можем записать в файл. Указываем имя файла куда будем записывать.
// Проверяем на валидность получившийся JSON файл.