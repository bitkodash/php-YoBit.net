<?php
session_start(); // � ����� ���������
       // ���� ��-������
function getDateRus(){
    $monthes = array(
        1 => '������', 2 => '�������', 3 => '�����', 4 => '������',
        5 => '���', 6 => '����', 7 => '����', 8 => '�������',
        9 => '��������', 10 => '�������', 11 => '������', 12 => '�������'
    );
    return ( (int)date('d') . ' ' . $monthes[(date('n'))] . date(' Y'));
}


     // ���� ������ ��-������
function getDayRus(){
    $days = array(
        '�����������', '�����������', '�������', '�����',
        '�������', '�������', '�������'
    );
    return $days[(date('w'))];
}
  $rusdate = getDateRus() . ", " . getDayRus();





        $date=  date("m,d,Y");
        $dd= date("w", mktime(0,0,0,  $date));
          //  $d=date("N");  //���� ������
         // $d=$d-1;
          $days2 = array(  '��', '��', '��', '��','��', '��', '��' );
        //     var_dump( $days2);
          $segodnya=    $days2[$dd];  //���������� ���� ������




?>




<?php
# ����������� �� ������� �������� ��� �����  icq 317418   ������ ����� ���� https://vk.com/bitcoindash
 # ��������� � ���� �����.
$komissiya=0.2;//�������� �����.
$cena_monets=0.84; //���� ������ �� �������.
$order=11020;//����� ������  ���������� ����� �����.
$procents=0.1;//��������  1 ������� =0.01   10%= 0.1  50% = 0.5
$day_vklad=30;//����� �� ���������� ����.
$symbol_monets="&#8381;";  //������ ������ � ������� html       BTC  =&#3647;    RUR = &#8381;
$klock_icon="&#9200;";

$time_reinvest="21:05";// ����� ���������� ���������.�����������  19 �������  � 19   �����   ����� ������ ��� �������.
$color_procent_rub="#800000"; //���� ����� ��������� ������������ �� ����� 21:05 ��� + (419 �.)
$color_total_monet="#003d99";//������� ����� �����
$color_cena_monet  ="800000" ;      //������� ����� ���������� ���    / � ��� �� �������� �������
$colodnedel  ="#DF7401" ;      //
$color_reinvest_monet   ="#003d99" ;    //�������   ���������� ����� ����� ���������
  $date=  date("Y-m-d");

?>

 <!doctype html>
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="./styles.css" rel="stylesheet">
  <table>

	<tr>


		 <th>���������� �������������� ����� �� ����� Yobit </th>
 <th width="100"> &nbsp;</th> 	<th> �������<font color='red'> <?php echo  $rusdate;  echo  '</font>   (����� ����� ����� '.$day_vklad.'   ���� '.  $_SESSION['var'] ;  ?>)<?php echo $symbol_monets;?></th>
			  </tr>
</table>
<table class="nums">

	<thead>
	<tr>
	   <th>����</th>
		<th>����</th>
		<th > �������� </th>
		<th>�����</th>
		<th>�����   </th>
			<th>+ 10%</th>
		<th>�����  &#8381;</th>
		<th>(�� �����<font color='33cc33'> <?php  echo $procents *100;?> %) </font>  </th>
       	<th>���  &#8381; -(<?php  echo $komissiya;?>)  %</th>
       <th>1 �� </th>

		</thead>


	<tbody>


<?php


    $cena_mon= ceil($order* $cena_monets);  //���� 1� ������
    $minus_komissiya  =   $cena_mon * $komissiya / 100;
   $tot=   ceil($cena_mon *10 / 100);      // zarabotano % posle reinvest
   $order2 =  $order *10 / 100;      // ���������� ����� ����� ���������


echo  $out =<<<EOFF

 <tr  bgcolor="#000">     <td><font color="#33ff33"># 0</font></td>
		 <td> <font color="#33ff33"> $date   $segodnya</font> </font></td>
		<td><a  href="" target="_blank"><font color="#33ff33">$time_reinvest $klock_icon</font></a></td>
		<td><a  href="" target="_blank"> <font color="#33ff33"> $day_vklad ��.</font></a></td>
			 <td>  <font color="#33ff33"> $order</font></td>
            <td> <font color="#33ff33">   $order2 </font></td>
	 <td>  <font color="#33ff33">  $cena_mon </font></td>
	 <td>  +  <font color="#33ff33"> $tot $symbol_monets  </font>  </td>
    <td> <font color="#33ff33">- $minus_komissiya </td>
       <td>  <font color="#33ff33"> $cena_monets  $symbol_monets </font> </td>
	</tr>


EOFF;



  //    ����� ��������� �� ������� � ��������� �� 100= �������  ������.
         $minus_komissiya  =   $cena_mon * $komissiya / 100;


          $time = strtotime($date); // �������� ����
           $time= $time+86400;


 for($i=0;$i <$day_vklad;$i++)

           {


                        #���� ������ ������� �� ������������ �����
                       //   $date=  date("m,d,Y");
                       //   $dd= date("w", mktime(0,0,0,  $date));



                           $dd++;

                           if($dd ===7){  $dd=0;   $color_today="red";} else{ $color_today="black";}
                          $today=  $days2[$dd] ;




           $order += ceil($procents* $order); //������� ���������� �����


                  $order2 =  $order *10 / 100;      // ���������� ����� ����� ���������



             $date_day=    date('Y-m-d', $time) ;




            $interval = 1 * 24 * 3600; // ����� ������ � 3 ������
            $time += $interval;

             $cenamonets  =    $order * $cena_monets;    //����� ���� �����.

                   $cenamonets=ceil( $cenamonets);
                  $minus_komissiya  =  $cenamonets * $komissiya / 100;
                  $minus_komissiya = number_format ( $minus_komissiya,2,'.',' ');   //�������� ���� ����� �����
                   $tot=  ceil($cenamonets  *10 / 100);      // zarabotano % posle reinvest
















       $ix=$i+1;

echo  $out =<<<EOFF
 <tr>   <td># $ix</td>
		<td>$date_day    <font color= $color_today>  $today </font></td>
		<td>$time_reinvest $klock_icon</td>
		<td>$day_vklad ��.</td>
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