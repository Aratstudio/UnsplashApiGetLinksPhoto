<?php
$token = '8fabde35ea682941436ddf829f86050bdb0564e62a1be770d6ce7d1e6f8dad10b54d1a309b25a1c5d6757';
$group_id = '182379697';
$vk = new Vk($token);




// $qoute=file_get_contents("https://api.forismatic.com/api/1.0/?method=getQuote&format=jsonp&jsonp=parseQuote");
// //$jqoute=json_decode($qoute);
// //print_r($qoute);

// echo ($qoute[0]->quoteText);



	











//unsplash-------------------------

$APIKey ='11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192';

$query = array('apple','wild','mountain','blue','cloud','car','bird','yellow','money','sun','rain','wild','tiger','red','iphone','rich');


//https://api.unsplash.com/search/photos?query=chicago&per_page=50&client_id=11f2ff5a50fcce4df43aa4c897d132d3f5ad4a84ed0aec7be67718deb5120192

$getApi=file_get_contents('https://api.unsplash.com/search/photos?query='.$query[array_rand($query)].'&per_page=5&client_id='.$APIKey);
//echo($getApi);
$data = json_decode($getApi);
foreach ($data as $key => $value) {

    
//обязательный, так как дает ссылку для скачивания
$unspPhoto0=$value[0]->urls->full;

//работает, тут просто вывод ссылок картинок
    // echo( $value[0]->urls->full), '<br>';
    // echo( $value[1]->urls->full), '<br>';
    // echo( $value[2]->urls->full), '<br>';
    // echo( $value[3]->urls->full), '<br>';
    // echo( $value[4]->urls->full), '<br>';


    $unspPhotoFullDecr=$value[0]->description;
    $unspPhotoDecr=$value[0]->alt_description;

    $concatenunspPhotoDecr=$unspPhotoFullDecr. '.'.$unspPhotoDecr;
   
    // $unspPhotoTags0=$value[0]->tags[1]->title;
    // $unspPhotoTags0=$value[0]->tags[0]->title;
    
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
//  echo($unspPhotoTags0),'<br>';
//  echo($unspPhotoTags1),'<br>';
//  echo($unspPhotoTags2),'<br>';

// echo($unspPhoto1),'<br>';
// echo($unspPhoto2),'<br>';
// echo($unspPhoto3),'<br>';
// echo($unspPhoto4),'<br>';


//конец unsplash-------------------------



$image_path = dirname(__FILE__).'/unspPhoto0.png'; 
copy($unspPhoto0, 'unspPhoto0.png');

// $image_path2 = dirname(__FILE__).'/test_name.png'; 
// copy('https://images.unsplash.com/photo-1524654458049-e36be0721fa2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjIyNjM5fQ', 'image.png');

$upload_server = $vk->photosGetWallUploadServer($group_id);

$upload = $vk->uploadFile($upload_server['upload_url'], $image_path);

$save = $vk->photosSaveWallPhoto([
        'group_id' => $group_id,
        'photo' => $upload['photo'],
        'server' => $upload['server'],
        'hash' => $upload['hash']
    ]
);



$attachments = sprintf('photo%s_%s', $save[0]['owner_id'], $save[0]['id']);


//  $array2 = json_decode(json_encode($attachments), true);
//  print_r($array2);

//  $array3 = json_decode(json_encode($attachments2), true);
//  print_r($array3);









$post = $vk->wallPost([
    'owner_id' => "-$group_id",
    'from_group' => 1,
    'message' => $concatenunspPhotoDecr,
    'attachments' => $attachments
   


]);


print_r($post);


class Vk
{
    private $token;
    private $v = '5.37';

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function wallPost($data)
    {
        return $this->request('wall.post', $data);
    }

    public function photosGetWallUploadServer($group_id)
    {
        $params = [
            'group_id' => $group_id,
        ];
        return $this->request('photos.getWallUploadServer', $params);
    }

    /**
     * @param $params [user_id, group_id, photo, server, hash]
     * @return mixed
     * @throws \Exception
     */
    public function photosSaveWallPhoto($params)
    {
        return $this->request('photos.saveWallPhoto', $params);
    }

    public function uploadFile($url, $path)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);

        if (class_exists('\CURLFile')) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, ['file1' => new \CURLFile($path)
            ]);
           
          //  print_r($ch);
         
        // $path  = dirname(__FILE__); 
		// $array = array("file1" => "@".$path."/test".mt_rand(1, 8).".jpg", "file2" => "@".$path."/test".mt_rand(1, 8).".jpg", "file3" => "@".$path."/test".mt_rand(1, 8).".jpg", "file4" => "@".$path."/test".mt_rand(1, 8).".jpg", "file5" => "@".$path."/test".mt_rand(1, 8).".jpg" );
        
            // print_r('87'+$ch);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, ['file1' => "@$path", 
            'file2' => new \CURLFile($path)
             
            ]);

            //print_r($ch);
        }
        
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
        unlink('./unspPhoto0.png');
        
    }
  

    private function request($method, array $params)
    {
        $params['v'] = $this->v;

        $ch = curl_init('https://api.vk.com/method/' . $method . '?access_token=' . $this->token);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $data = curl_exec($ch);
      
        curl_close($ch);
        $json = json_decode($data, true);
        
        //print_r($json);
        if (!isset($json['response'])) {
            throw new \Exception($data);
        }
        usleep(mt_rand(1000000, 2000000));
        return $json['response'];
    }
}