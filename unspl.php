<?php

$APIKey ='11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192';

$getApi=file_get_contents('https://api.unsplash.com/search/photos?query=chicago&per_page=50&client_id=11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192');
$data = json_decode($getApi);
foreach ($data as $key => $value) {

//работает, тут просто вывод ссылок картинок
    // echo( $value[0]->urls->full), '<br>';
    // echo( $value[1]->urls->full), '<br>';
    // echo( $value[2]->urls->full), '<br>';
    // echo( $value[3]->urls->full), '<br>';
    // echo( $value[4]->urls->full), '<br>';


    $unspPhoto0=$value[0]->urls->full;
    $unspPhoto1=$value[1]->urls->full;
    $unspPhoto2=$value[2]->urls->full;
    $unspPhoto3=$value[3]->urls->full;
    $unspPhoto4=$value[4]->urls->full;

//проверка
    // print_r( $value[1]->urls->full);
    // print_r( $value[2]->urls->full);
    // print_r( $value[3]->urls->full);

}

echo($unspPhoto0),'<br>';
echo($unspPhoto1),'<br>';
echo($unspPhoto2),'<br>';
echo($unspPhoto3),'<br>';
echo($unspPhoto4),'<br>';










?>