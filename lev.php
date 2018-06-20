<?php

function ganti_kata($kata)  {
$ganti = $kata;
$kamus = array(
//bahasa indonesia ke latin
    'oksi'=>'oxi',
    'irin'=>'irine',
    'alop'=>'allop',
    'nol'=>'nole',
    'hid'=>'hyd',
    'klor'=>'chlor',
    'ida'=>'ide',
    'din'=>'dine',
    'fet'=>'phet',
    'min'=>'mine',
    'at'=>'ate', //hati2
    'fot'=>'phot',
    'sin'=>'cin',
    'fat'=>'phat', // bentrok sama sulfat sulfuric
    'fil'=>'phyl',
    'lin'=>'line',
    'pti'=>'pty',
    'pin'=>'pine',
    'sil'=>'syl',
    'kui'=>'qui',
    'sili'=>'cilli',
    'natrium'=>'sodium',
    'amo'=>'ammo',
    'fin'=>'phine',
    'inat'=>'inic',
    'asam'=>'acid',
    'ase'=>'ace',
    'tat'=>'tic',
    'til'=>'tyl',
    'silat'=>'cylic',
    'skor'=>'scor',
    'fos'=>'phos',
    'dat'=>'dic',
    'amat'=>'amic',
    'iksat'=>'ixic',
    'rat'=>'rate',
    'noit'=>'noic',
    'sit'=>'cit',
    'bat'=>'bic',
    'lfat'=>'lfuric',
    'ofen'=>'ophen',
    'sik'=>'cyc',
    'izol'=>'izole',
    'kuri'=>'curi',
    'tio'=>'thio',
    'rin'=>'rine',
    'trom'=>'throm',
    'isin'=>'ycin',
    'tas'=>'thas',
    'on'=>'one',
    'smut'=>'smuth',
    'galat'=>'gallate',
    'karb'=>'carb',
    'omi'=>'omy',
    'heks'=>'hex',
    'vak'=>'vac',
    'ain'=>'aine',
    'krip'=>'crip',
    'lat'=>'late',
    'til'=>'thy',
    'drat'=>'drous',
    'luen'=>'luene',
    'oksam'=>'oxam',
    'eksa'=>'exa',
    'eat'=>'eate',
    'eks'=>'ex',
    'kua'=>'qua',
    'buka'=>'buca',
    'etil'=>'ethyl',
    'pira'=>'pyra',
    'uksi'=>'ucci',
    'ekon'=>'econ',
    'azol'=>'azole',
    'tin'=>'tine',
    'efe'=>'ephe',
    'ekon'=>'econ',
    'eta'=>'etha',
    'eti'=>'ethy',
    'ekso'=>'exo',
    'fen'=>'phen',
    'kort'=>'cort',
    'klok'=>'clox',
    'sein'=>'cein',
    'asep'=>'azep',
    'tami'=>'tamy',
    'kap'=>'cap',
    'sia'=>'cya',
    'eta'=>'etha',
    'ikot'=>'icon',
    'oksu'=>'oxsu',
    'kals'=>'calc',
    'siu'=>'ciu',
    'akt'=>'act',
    'ami'=>'amy',
    'oksa'=>'oxa',
    'sel'=>'cell',
    'losa'=>'lose',
    'kla'=>'cla',
    'kalium'=>'potassium',
    'kov'=>'cov',
    'lis'=>'lys',
    'oksp'=>'oxp',
    'etid'=>'ethid',
    'ikam'=>'icam',
    'rfan'=>'rphan',
    'meto'=>'metho'

// ini yang metode sinonim
// misalkan sodium -> antrium
// ketika terlalu jauh
// 'oksi'=>'oxy',

);



    foreach ($kamus as $key => $rlp) {
        $ganti = str_ireplace($key,$rlp,$ganti);
    //        if ($ganti != $kata) {var_dump($ganti);}  FOR TESTING PURPOSES
    }
    return $ganti;

}

function difference_value($source, $target) {
    $s = strlen($source);
    $t = strlen($target);

    $maxlen = max($s,$t);

    $res = $maxlen - levenshtein($source,$target);
    return $res/$maxlen*100;
}


    //memeriksa apakah levensthein > len(target) / 2 ? jika iya maka tidak diperiksa.
    //echo 'Silahkan masukkan karakter source : ' ;
    $source = $_POST['source'];
    //echo 'Silahkan masukkan karakter target : ';
    $target = $_POST['target'];
    $before_change = difference_value($source,$target);

    

    //kecilkan karakter tersebut karena akan terjadi perbedaan huruf kapital dan kecil
    $source = strtolower($source);
    $target = strtolower($target);

    $diff1 = levenshtein($source,$target);
    $diff2 = strlen($target) / 2;

    if ($diff1 >= $diff2)  {
        exit('Karakter terlalu berbeda');
    }

	$m = strlen($source);
    $n = strlen($target);
    
    $found = array();
    
    // inisiasi awal 0..n
	for($i=0;$i<=$m;$i++) $d[$i][0] = $i;
	for($j=0;$j<=$n;$j++) $d[0][$j] = $j;

// LEVENSTHEIN KLEIWEG

	for($i=1;$i<=$m;$i++) {
		for($j=1;$j<=$n;$j++) {
			$c = ($source[$i-1] == $target[$j-1])?0:1;
            $d[$i][$j] = min($d[$i-1][$j]+1,$d[$i][$j-1]+1,$d[$i-1][$j-1]+$c);           
        }

    }

    //create a matrix
    echo '<h2>Matriks Sumber</h2>
    <table class="table table-hover"> <tbody>';
    for($i=1;$i<=$m;$i++) {
        echo '<tr>';
		for($j=1;$j<=$n;$j++) {
            echo '<td>' .$d[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo '</tbody></table>';
    echo '<h6>Persentase kemiripan :' . $before_change . '% </h6>';
    
// Mencetak hasil murni yang telah diproses menggunakan klewig biasa
 

// LEVENSTHEIN SAIDAH
// Pertama ubah dulu jadi kata replace, kemudian hitung kembali dengan levensthein

$tmp_source = ganti_kata($source);
//var_dump($tmp_source);
$tmp_target = ganti_kata($target);
//var_dump($tmp_target);
// Kedua kita lakukan iterasi seperti diatas..
$after_change = difference_value($tmp_source,$tmp_target);

$s = strlen($tmp_source);
$t = strlen($tmp_target);


$tmp_found = array();


 // inisiasi awal 0..n
 for($x=0;$x<=$s;$x++) $g[$x][0] = $x;
 for($y=0;$y<=$t;$y++) $g[0][$y] = $y;

 for($x=1;$x<=$s;$x++) {
    for($y=1;$y<=$t;$y++) {
        $md = ($tmp_source[$x-1] == $tmp_target[$y-1])?0:1;
        $g[$x][$y] = min($g[$x-1][$y]+1,$g[$x][$y-1]+1,$g[$x-1][$y-1]+$md);
        
    }

}
//create a matrix
echo '<h2>Matriks Target</h2><h6>Menjadi kata : '.$tmp_target.'</h6>
<table class="table table-hover"> 
 <tbody>';
    for($i=1;$i<=$s;$i++) {
        echo '<tr>';
		for($j=1;$j<=$t;$j++) {
            echo '<td>' .$g[$i][$j]. '</td>';
        }
        echo "</tr>";
    }
    echo '</tbody></table>';
    echo '<h6>Persentase kemiripan :' . $after_change . '% </h6>';
//var_dump($tmp_found,levenshtein($s,$t));
?>


