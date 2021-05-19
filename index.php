<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include_once 'User.php';

?>
<form action="">
    <input type="hidden" name="input" value="1">
    <button type="submit">Nhỏ Hơn</button>
</form>
<form action="">
    <input type="hidden" name='input' value="2">
    <button type="submit">Lớn Hơn</button>
</form>
<?php
$num1 = $_REQUEST['input'];

function check($input)
{
$low = 0;
$high = 100;

    $guessRan = floor(($low + $high)/2);
    $data = getDataJson('data.json');
    $arr = (array)$data[0];
    $low = $arr['low'];
    $high = $arr['high'];
    $guessRan = floor(($low + $high)/2);
    $temp = [
        'low' => $low,
        'high' => $high
    ];
    if ($input == 1) {
        $newHigh = $guessRan - 1;
        $temp = [
            'low' => $low,
            'high' => $newHigh
        ];
    } elseif ($input == 2) {
        $newLow = $guessRan + 1;
        $temp = [
            'low' => $newLow,
            'high' => $high
        ];
    }


//    $temp = [
//        'low' => $low,
//        'high' => $high
//    ];
    $user = new User($temp);
    $data = [$user];
    saveDatatoFile('data.json', $data);
    return $guessRan;
}

echo check($num1);


//function countGuess($input = 0): int
//{
//    $data = getDataJson('data.json');
//    $low = $data[0]->getLow();
//    $high = $data[0]->getHigh();
//    $temp = [
//        'low' => $low,
//        'high' => $high
//    ];
//    $user = new User($temp);
//    $data1 = [];
//    array_push($data1, $user);
//    saveDatatoFile('data.json', $data1);
//    echo $user->getLow();
//}
function saveDatatoFile($filePath, $data)
{
    $dataJson = json_encode($data);
    file_put_contents($filePath, $dataJson);
}

function getDataJson($filePath)
{
    $dataJson = file_get_contents($filePath);
    return json_decode($dataJson);
}

?>
</body>
</html>