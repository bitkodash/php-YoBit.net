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


          $d=date("N");  //День недели
         // $d=$d-1;
          $days2 = array(  'Вс', 'Пн', 'Вт', 'Ср','Чт', 'Пт', 'Сб' );

     $segodnya=    $days2[$d];  //Сегодняший день недели


?>
<!doctype html>
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="./styles.css" rel="stylesheet">
  <table>

	<tr>


		 <th>Каркулятор Инвестирования монет на бирже Yobit</th>
				 <th width="140"> &nbsp;</th> 	<th> Сегодня<font color='red'> <?php echo  $rusdate;  echo  '</font>   (total summ '.  $_SESSION['var'] ;  ?>)BTC</th>
			  </tr>

</table>



<?php
# Разработака не сложных скриптов под заказ  icq 317418   пишите через сайт https://vk.com/bitcoindash
 # Настройки в этом блоке.
$komissiya=0.2;//Комиссия биржи.
$cena_monets=0.00000226; //Цена монеты за еденицу.
$order=5975;//Ордер инвест  количество монет всего.
$procents=0.1;//Проценты  1 процент =0.01   10%= 0.1  50% = 0.5
$day_vklad=90;//Вклад на количество дней.



$time_reinvest="21:05";// Время начисления процентов.Понедельник  19 февраля  в 19   часов   Время просто для красоты.
$color_procent_rub="blue"; //Цвет суммы процентов заработанных за сутки 21:05 час + (419 р.)
$color_total_monet="#DF7401";//Колонка Всего монет
$color_cena_monet  ="#0B2F3A" ;      //Колонка Сумма Заработано Руб
$colodnedel  ="#DF7401" ;      //Колонка Сумма Заработано Руб
$date=  date("Y-m-d");

 $cena_btc_monets  = number_format (   $cena_monets  ,8,'.',' ');   //Приводим  в порядок числа  имеющие буквы  типа в место 0.0000005  E1 33


?>





<table class="nums">

	<thead>
	<tr>
	   <th>День</th>
		<th>Дата</th>
		<th>Реинвест (выплата<font color='blue'> <?php  echo $procents *100;?> %) </font></th>
		<th>Вклад дней</th>
		<th>Всего монет </th>
		<th>Сумма BTC</th>
       	<th>Ком btc  -(<?php  echo $komissiya;?>)  %</th>
       <th>Цена за 1 шт Руб</th>

		</thead>


	<tbody>


<?php


    $cena_mon= $order* $cena_monets;  //Цена 1й монеты


   $minus_komissiya  =   $cena_mon * $komissiya / 100;
    $minus_komissiya = number_format (  $minus_komissiya,8,'.',' ');

   $tot=   $cena_mon *10 / 100;      // zarabotano % posle reinvest
  //  $tot = number_format ( $tot,8,'.',' ');   //Приводим  в порядок числа  имеющие буквы  типа в место 0.0000005  E1 33
echo  $out =<<<EOFF

 <tr>     <td class="red"># 0</font></td>
		 <td class="red"> $date   $segodnya </font></td>
		<td><a  href="" target="_blank"><font color="red">$time_reinvest час +  ($tot btc.)</font></a></td>
		<td><a  href="" target="_blank"> <font color="red"> $day_vklad</font></a></td>
			 <td class="red">  $order</td>

	 <td class="red">   $cena_mon </td>
    <td class="red">- $minus_komissiya </td>
       <td class="red">  $cena_btc_monets   </td>
	</tr>


EOFF;



  //    сумму помножить на процент и разделить на 100= процент  дохода.
         $minus_komissiya  =   $cena_mon * $komissiya / 100;


          $time = strtotime($date); // Исходная дата



 for($i=0;$i <$day_vklad;$i++)

           {


                        #День недели выводим от сегодняшнего числа

                        $e_day=    date('d', $time) ;
                        $d++;   if($d==7){ $d=0;}
                        $today=  $days2[$d] ;






            $order += ceil($procents* $order); //Выводим количество монет



             $date_day=    date('Y-m-d', $time) ;

            $interval = 1 * 24 * 3600; // число секунд в 3 сутках
            $time += $interval;

             $cenamonets  =    $order * $cena_monets;    //Общая цена монет.

                //   $cenamonets=ceil( $cenamonets);

                   $minus_komissiya  =  $cenamonets * $komissiya / 100;
                    $minus_komissiya = number_format ( $minus_komissiya,8,'.',' ');   //Приводим  в порядок числа  имеющие буквы  типа в место 0.0000005  E1 33


                   $tot2=  $cenamonets  *10 / 100;      // zarabotano % posle reinvest
                  $tot2 = number_format ( $tot2,8,'.',' ');   //Приводим  в порядок числа  имеющие буквы  типа в место 0.0000005  E1 33

                         $cenamonets  =    $order * $cena_monets;














       $ix=$i+1;

echo  $out =<<<EOFF
 <tr>   <td># $ix</td>
		<td>$date_day   <font color=$colodnedel>  $today</font></td>
		<td>$time_reinvest час + <font color=$color_procent_rub>($tot2 btc.) </font></td>
		<td>$day_vklad</td>
			<td>  <font color= $color_total_monet>$order</font></td>
				<td>  <font color= $color_cena_monet>$cenamonets</font></td>

        	<td> - $minus_komissiya   </td>
               <td>   $cena_btc_monets </td>


	</tr>


EOFF;



    }

        $_SESSION['var']= $cenamonets;



?>
     </tbody>
</table>
		</html>