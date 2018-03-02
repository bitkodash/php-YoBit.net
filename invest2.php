<?php
session_start(); // в шапку добавляем
       // Дата по-русски
function getDateRus(){
    $monthes = array(
        1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
        5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
        9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
    );
    return ( (int)date('d') . ' ' . $monthes[(date('n'))] . date(' Y'));
}


     // День недели по-русски
function getDayRus(){
    $days = array(
        'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
        'Четверг', 'Пятница', 'Суббота'
    );
    return $days[(date('w'))];
}
  $rusdate = getDateRus() . ", " . getDayRus();





        $date=  date("m,d,Y");
        $dd= date("w", mktime(0,0,0,  $date));
          //  $d=date("N");  //День недели
         // $d=$d-1;
          $days2 = array(  'Вс', 'Пн', 'Вт', 'Ср','Чт', 'Пт', 'Сб' );
        //     var_dump( $days2);
          $segodnya=    $days2[$dd];  //Сегодняший день недели




?>




<?php
# Разработака не сложных скриптов под заказ  icq 317418   пишите через сайт https://vk.com/bitcoindash
 # Настройки в этом блоке.
$komissiya=0.2;//Комиссия биржи.
$cena_monets=0.84; //Цена монеты за еденицу.
$order=11020;//Ордер инвест  количество монет всего.
$procents=0.1;//Проценты  1 процент =0.01   10%= 0.1  50% = 0.5
$day_vklad=30;//Вклад на количество дней.
$symbol_monets="&#8381;";  //Символ монеты в формате html       BTC  =&#3647;    RUR = &#8381;
$klock_icon="&#9200;";

$time_reinvest="21:05";// Время начисления процентов.Понедельник  19 февраля  в 19   часов   Время просто для красоты.
$color_procent_rub="#800000"; //Цвет суммы процентов заработанных за сутки 21:05 час + (419 р.)
$color_total_monet="#003d99";//Колонка Всего монет
$color_cena_monet  ="800000" ;      //Колонка Сумма Заработано Руб    / А так же проценты колонка
$colodnedel  ="#DF7401" ;      //
$color_reinvest_monet   ="#003d99" ;    //Колонка   заработано монет после реинвеста
  $date=  date("Y-m-d");

?>

 <!doctype html>
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="./styles.css" rel="stylesheet">
  <table>

	<tr>


		 <th>Каркулятор Инвестирования монет на бирже Yobit </th>
 <th width="100"> &nbsp;</th> 	<th> Сегодня<font color='red'> <?php echo  $rusdate;  echo  '</font>   (Общий доход через '.$day_vklad.'   дней '.  $_SESSION['var'] ;  ?>)<?php echo $symbol_monets;?></th>
			  </tr>
</table>
<table class="nums">

	<thead>
	<tr>
	   <th>День</th>
		<th>Дата</th>
		<th > Реинвест </th>
		<th>Вклад</th>
		<th>Монет   </th>
			<th>+ 10%</th>
		<th>Сумма  &#8381;</th>
		<th>(за сутки<font color='33cc33'> <?php  echo $procents *100;?> %) </font>  </th>
       	<th>Ком  &#8381; -(<?php  echo $komissiya;?>)  %</th>
       <th>1 шт </th>

		</thead>


	<tbody>


<?php


    $cena_mon= ceil($order* $cena_monets);  //Цена 1й монеты
    $minus_komissiya  =   $cena_mon * $komissiya / 100;
   $tot=   ceil($cena_mon *10 / 100);      // zarabotano % posle reinvest
   $order2 =  $order *10 / 100;      // Заработано монет после реинвеста


echo  $out =<<<EOFF

 <tr  bgcolor="#000">     <td><font color="#33ff33"># 0</font></td>
		 <td> <font color="#33ff33"> $date   $segodnya</font> </font></td>
		<td><a  href="" target="_blank"><font color="#33ff33">$time_reinvest $klock_icon</font></a></td>
		<td><a  href="" target="_blank"> <font color="#33ff33"> $day_vklad дн.</font></a></td>
			 <td>  <font color="#33ff33"> $order</font></td>
            <td> <font color="#33ff33">   $order2 </font></td>
	 <td>  <font color="#33ff33">  $cena_mon </font></td>
	 <td>  +  <font color="#33ff33"> $tot $symbol_monets  </font>  </td>
    <td> <font color="#33ff33">- $minus_komissiya </td>
       <td>  <font color="#33ff33"> $cena_monets  $symbol_monets </font> </td>
	</tr>


EOFF;



  //    сумму помножить на процент и разделить на 100= процент  дохода.
         $minus_komissiya  =   $cena_mon * $komissiya / 100;


          $time = strtotime($date); // Исходная дата
           $time= $time+86400;


 for($i=0;$i <$day_vklad;$i++)

           {


                        #День недели выводим от сегодняшнего числа
                       //   $date=  date("m,d,Y");
                       //   $dd= date("w", mktime(0,0,0,  $date));



                           $dd++;

                           if($dd ===7){  $dd=0;   $color_today="red";} else{ $color_today="black";}
                          $today=  $days2[$dd] ;




           $order += ceil($procents* $order); //Выводим количество монет


                  $order2 =  $order *10 / 100;      // Заработано монет после реинвеста



             $date_day=    date('Y-m-d', $time) ;




            $interval = 1 * 24 * 3600; // число секунд в 3 сутках
            $time += $interval;

             $cenamonets  =    $order * $cena_monets;    //Общая цена монет.

                   $cenamonets=ceil( $cenamonets);
                  $minus_komissiya  =  $cenamonets * $komissiya / 100;
                  $minus_komissiya = number_format ( $minus_komissiya,2,'.',' ');   //Отсекаем нули после точки
                   $tot=  ceil($cenamonets  *10 / 100);      // zarabotano % posle reinvest
















       $ix=$i+1;

echo  $out =<<<EOFF
 <tr>   <td># $ix</td>
		<td>$date_day    <font color= $color_today>  $today </font></td>
		<td>$time_reinvest $klock_icon</td>
		<td>$day_vklad дн.</td>
			<td  bgcolor="#ffe6cc">  <font color= $color_total_monet>$order </font></td>
			<td   bgcolor="#ffe6cc">  <font color= $color_reinvest_monet>   $order2 </font></td>
				<td  bgcolor="#e6fff2">  <font color= $color_cena_monet>$cenamonets</font></td>
					<td  bgcolor="#e6fff2">  + <font color=$color_procent_rub>$tot $symbol_monets </font> </td>

        	<td> - $minus_komissiya $symbol_monets  </td>
               <td>  $cena_monets  $symbol_monets </td>


	</tr>


EOFF;



    }

        $_SESSION['var']= $cenamonets;



?>
     </tbody>
</table>
		</html>