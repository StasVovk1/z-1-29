<?php 
$mass = [960,123,435,546,42133,345,565,765,876,345,234,657,768,478,967,456,321];
$answer = [];
$k = 6;
echo 'Исходные данные K = '.$k.'; исходный массив:'.json_encode($mass);

for($g = 0; $g < counts($mass); $g++){
    $m = decompositionOfTheNumber($mass[$g]);
    $perem = 0;
    $count_m = 0;
    for ($i = 0; $i < counts($m); $i++){
        if ($k == $m[$i]){
            $answer[] = 'Y';
            break;
        }else if ($k > $m[$i] && $m[$i] != 0){            
            $perem = $m[$i];
            $count_m ++;
            for ($j = 0; $j < counts($m); $j++){
                if ($i != $j){
                    if ($perem + $m[$j] <= $k){
                        $perem += $m[$j];
                        $count_m ++;
                    }                
                }
            }
            if ($perem == $k){
                $answer[] = $count_m == counts($m) ? 'S' : 'Y';
                $perem = 0;
                break;
            }else {
                $perem = 0;
            }
        }
        if ($i == counts($m)-1){
            $answer[] = 'N';
        }
    }
    $summ = 0;
}



echo '<br>Ответ: '.json_encode($answer);
echo '<br>Y - можно составить число '.$k.' или оно уже есть в числе, и есть что еще удалить; <br>N - число '.$k.' отсутствует и невозможно его собрать; <br>S - вариант числа когда искомое число '.$k.' составилась без удаления лишних цифр;';

 // разбиение числа на отдельные числа и запись их в массив
function decompositionOfTheNumber ($number) {
    $number = ''.$number.'';
    $answer = array();
    for($i = 0; $i < strlens($number); $i++ ){
        $answer[] = "" + $number[$i];   
    }
    return $answer;
}

function counts($mass){
    $i = 1;            
    while ($mass[$i].'' != ''){
        $i++;
    }
    return $i;
}
function strlens($str){
    $i = 0;            
    while ($str[$i] != ""){
        $i++;
    }
    return $i;
}

?>