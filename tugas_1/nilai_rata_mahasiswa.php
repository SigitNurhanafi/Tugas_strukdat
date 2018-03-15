<?php

$jsonString = file_get_contents('./data_mahasiswa.json');
$data = json_decode($jsonString, true);

// kondisi jika data nilai mahasiswa masih kosong, maka akan membuat data acak baru
if ($data == NULL){
    generateDataRandom();
}

menghitungNilaiRataRata($data);

function generateDataRandom(){
// IS : Data kosong , berasal dari file json data_mahasiswa.json
// FS : Membuat data baru secara acak mencakup data NIM, Nama, Quiz, UTS, dan UTS
    for ($x = 0; $x <= 50; $x++){
        
        $length = rand(8,18);
        $characters = 'abcd efghijkl mnopqrs tuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        // membuat nama random
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    
       $data[$x]['nim'] = rand();
       $data[$x]['name'] = $randomString;
       $data[$x]['quiz']['1'] = rand(45,100);
       $data[$x]['quiz']['2'] = rand(60,100);
       $data[$x]['quiz']['3'] = rand(30,100);
       $data[$x]['uts'] = rand(50,100);
       $data[$x]['uas'] = rand(20,100);

       // insert data yang sudah dibuat
       file_put_contents('./data_mahasiswa.json', json_encode($data));

    }
}

function menghitungNilaiRataRata($data){
    
    for ($x = 0; $x < 10; $x++){
        
        $jumlah_nilai = 5;
        $mean = ($data[$x]['quiz']['1'] + $data[$x]['quiz']['2'] 
                + $data[$x]['quiz']['3'] + $data[$x]['uts'] 
                + $data[$x]['uas']) / $jumlah_nilai ;
        
        echo "\n";
        echo $x+1;
        
        echo "\n";
        echo 'NIM       : ' . $data[$x]['nim'] ;
        echo "\n";
        echo 'NAMA      : ' . $data[$x]['name'] ;
        echo "\n";
        echo "QUIZ 1    : " . $data[$x]['quiz']['1'];
        echo "\n"; 
        echo "QUIZ 2    : " . $data[$x]['quiz']['2'];
        echo "\n";
        echo "QUIZ 3    : " . $data[$x]['quiz']['3'];
        echo "\n";
        echo "UTS       : " . $data[$x]['uts'];
        echo "\n";
        echo "UAS       : " . $data[$x]['uas'];
        echo "\n";
        echo "NILAI RATA - RATA : " . $mean ;
        echo "\n";
    }

}


?>