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

function minix ($x, $y,$z) {  // fungsi ini mencari yang paling minimum aja, sebagai pelengkap min()
      $h = min($x,$y,$z);
      if ($h == $x) {
          return 1;
      } else if ($h == $y) {
          return 2;
      } else {
          return 3;
      }
      
}
    //memeriksa apakah levensthein > len(target) / 2 ? jika iya maka tidak diperiksa.
    //echo 'Silahkan masukkan karakter source : ' ;
    $source = $argv[1];
    //echo 'Silahkan masukkan karakter target : ';
    $target = $argv[2];
    

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
    echo "\n";
    for($i=1;$i<=$m;$i++) {
        
		for($j=1;$j<=$n;$j++) {
            echo $d[$i][$j] . "|";
        }
        echo "\n";
    }
    
// Mencetak hasil murni yang telah diproses menggunakan klewig biasa
 

// LEVENSTHEIN SAIDAH
// Pertama ubah dulu jadi kata replace, kemudian hitung kembali dengan levensthein

$tmp_source = ganti_kata($source);
var_dump($tmp_source);
$tmp_target = ganti_kata($target);
var_dump($tmp_target);
// Kedua kita lakukan iterasi seperti diatas..


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
echo "\n";
    for($i=1;$i<=$s;$i++) {
        
		for($j=1;$j<=$t;$j++) {
            echo $g[$i][$j]. "|";
        }
        echo "\n";
    }

//var_dump($tmp_found,levenshtein($s,$t));
?>


