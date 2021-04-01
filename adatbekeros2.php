<?php 
$hibak = ['hiba' => ''];
$array = array();
$osszeg = 0;
$elem = "";
$lementhetem = "";
$uj = "";
$feltolt = array();
$index = 0;

	if(isset($_GET['szamol']))
	{	
			if(!empty($_GET['text']) && !empty($_GET['text2']) && !empty($_GET['text3']) !empty($_GET['person']))
			{
				$num = $_GET['text'];
				$num2 = $_GET['text2'];		
				/*
				
				
				function Feltolt($elem,&$feltolt,&$index)
				{
						$feltolt[$index] = $elem;
						$index++;		
				}*/
				/*function method($num, $num2, &$array)
				{
					$array[0] = $num;
					$array[1] = $num2;
				}
				method($num,$num2,$array);	

				function Osszead(&$array,&$osszeg)
				{
					foreach($array as $ar)
					{
						 $osszeg += $ar;
					}
				}
				Osszead($array,$osszeg);

				$elem = $_GET['text3'];
				function nevek($elem,&$elment)
				{
					$elment = $elem;
				}
				nevek($elem,$lementhetem);

				$person = $_GET['person'];
				function naMost($person,&$uj)
				{
					$uj = 'Nevem '.$person;
				}
				naMost($person,$uj); */
			}
			else
			{
				$hibak['hiba'] = 'Nem írtál be számot';
			}
			/* 1. feladat
			foreach($array as $ar)
			{
				echo $ar.' ';
			} */
			/*  2. feladat
			echo $osszeg; */
			/*  3. feladat
			echo $lementhetem; */
			/*  4. feladt
			echo $uj; */
			/* 5. Feltolt($num,$feltolt,$index);
			Feltolt($num2,$feltolt,$index);
			Feltolt($elem,$feltolt,$index);
			Feltolt($person,$feltolt,$index);
			foreach($feltolt as $elem)
			{
				echo $elem.' ';
			}*/
	}

	
?>

