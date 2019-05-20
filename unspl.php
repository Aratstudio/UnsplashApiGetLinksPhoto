<?php

// //unsplash-------------------------

// $APIKey ='11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192';

// $query = array('apple','wild','mountain','blue','cloud');




// //https://api.unsplash.com/search/photos?query=chicago&per_page=50&client_id=11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192

// $getApi=file_get_contents('https://api.unsplash.com/search/photos?query='.$query[array_rand($query)].'&per_page=5&client_id='.$APIKey);
// //echo($getApi);
// $data = json_decode($getApi);
// foreach ($data as $key => $value) {

// //работает, тут просто вывод ссылок картинок
//     // echo( $value[0]->urls->full), '<br>';
//     // echo( $value[1]->urls->full), '<br>';
//     // echo( $value[2]->urls->full), '<br>';
//     // echo( $value[3]->urls->full), '<br>';
//     // echo( $value[4]->urls->full), '<br>';


//     // $unspPhoto0=$value[0]->urls->full;
//     // $unspPhotoTags0=$value[0]->tags[0]->title;
//     // $unspPhotoTags1=$value[0]->tags[1]->title;
//     // $unspPhotoTags2=$value[0]->tags[2]->title;
//     // $unspPhoto1=$value[1]->urls->full;
//     // $unspPhoto2=$value[2]->urls->full;
//     // $unspPhoto3=$value[3]->urls->full;
//     // $unspPhoto4=$value[4]->urls->full;

// //проверка
//     //\\ print_r( $value[1]->urls->full);
//     // print_r( $value[2]->urls->full);
//     // print_r( $value[3]->urls->full);
//      print_r( $value[0]->alt_description);

// }

// // echo($unspPhoto0),'<br>';
// //  echo($unspPhotoTags0),'<br>';
// //  echo($unspPhotoTags1),'<br>';
// //  echo($unspPhotoTags2),'<br>';

// // echo($unspPhoto1),'<br>';
// // echo($unspPhoto2),'<br>';
// // echo($unspPhoto3),'<br>';
// // echo($unspPhoto4),'<br>';

// print_r($unspPhotoTags0=$value[0]->tags[4]->title);


// //конец unsplash-------------------------








//unsplash-------------------------

$APIKey ='11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192';

$query = array('apple','wild','mountain','blue','cloud','car','bird','yellow','money','sun','rain','wild','tiger','red','iphone','rich');


//https://api.unsplash.com/search/photos?query=chicago&per_page=50&client_id=11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192

$getApi=file_get_contents('https://api.unsplash.com/search/photos?query='.$query[array_rand($query)].'&per_page=5&client_id='.$APIKey);
echo($getApi);
$data = json_decode($getApi);
foreach ($data as $key => $value) {

//работает, тут просто вывод ссылок картинок
    // echo( $value[0]->urls->full), '<br>';
    // echo( $value[1]->urls->full), '<br>';
    // echo( $value[2]->urls->full), '<br>';
    // echo( $value[3]->urls->full), '<br>';
    // echo( $value[4]->urls->full), '<br>';


    $unspPhoto0=$value[0]->urls->full;
    //эксперимент
    $unspPhotoTags0=$value[0]->alt_description;



    // $unspPhotoTags0=$value[0]->tags[1]->title;


    // $unspPhotoTags0=$value[0]->tags[2]->title;
    // $unspPhotoTags0=$value[0]->tags[3]->title;
    // $unspPhotoTags0=$value[0]->tags[5]->title;


    // $unspPhotoTags1=$value[0]->tags[1]->title;
    // $unspPhotoTags2=$value[0]->tags[2]->title;
    // $unspPhoto1=$value[1]->urls->full;
    // $unspPhoto2=$value[2]->urls->full;
    // $unspPhoto3=$value[3]->urls->full;
    // $unspPhoto4=$value[4]->urls->full;

//проверка
    // print_r( $value[1]->urls->full);
    // print_r( $value[2]->urls->full);
    // print_r( $value[3]->urls->full);

}

// echo($unspPhoto0),'<br>';
 echo($unspPhotoTags0),'<br>';

 echo( $unspPhotoTags0);
//  echo($unspPhotoTags1),'<br>';
//  echo($unspPhotoTags2),'<br>';

// echo($unspPhoto1),'<br>';
// echo($unspPhoto2),'<br>';
// echo($unspPhoto3),'<br>';
// echo($unspPhoto4),'<br>';


//конец unsplash-------------------------






















?>