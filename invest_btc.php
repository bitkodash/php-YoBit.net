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


          $d=date("N");  //���� ������
         // $d=$d-1;
          $days2 = array(  '��', '��', '��', '��','��', '��', '��' );

     $segodnya=    $days2[$d];  //���������� ���� ������


?>
<!doctype html>
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="./styles.css" rel="stylesheet">
  <table>

	<tr>


		 <th>���������� �������������� ����� �� ����� Yobit</th>
				 <th width="140"> &nbsp;</th> 	<th> �������<font color='red'> <?php echo  $rusdate;  echo  '</font>   (total summ '.  $_SESSION['var'] ;  ?>)BTC</th>
			  </tr>

</table>



<?php
# ����������� �� ������� �������� ��� �����  icq 317418   ������ ����� ���� https://vk.com/bitcoindash
 # ��������� � ���� �����.
$komissiya=0.2;//�������� �����.
$cena_monets=0.00000226; //���� ������ �� �������.
$order=5975;//����� ������  ���������� ����� �����.
$procents=0.1;//��������  1 ������� =0.01   10%= 0.1  50% = 0.5
$day_vklad=90;//����� �� ���������� ����.



$time_reinvest="21:05";// ����� ���������� ���������.�����������  19 �������  � 19   �����   ����� ������ ��� �������.
$color_procent_rub="blue"; //���� ����� ��������� ������������ �� ����� 21:05 ��� + (419 �.)
$color_total_monet="#DF7401";//������� ����� �����
$color_cena_monet  ="#0B2F3A" ;      //������� ����� ���������� ���
$colodnedel  ="#DF7401" ;      //������� ����� ���������� ���
$date=  date("Y-m-d");

 $cena_btc_monets  = number_format (   $cena_monets  ,8,'.',' ');   //��������  � ������� �����  ������� �����  ���� � ����� 0.0000005  E1 33


?>





<table class="nums">

	<thead>
	<tr>
	   <th>����</th>
		<th>����</th>
		<th>�������� (�������<font color='blue'> <?php  echo $procents *100;?> %) </font></th>
		<th>����� ����</th>
		<th>����� ����� </th>
		<th>����� BTC</th>
       	<th>��� btc  -(<?php  echo $komissiya;?>)  %</th>
       <th>���� �� 1 �� ���</th>

		</thead>


	<tbody>


<?php


    $cena_mon= $order* $cena_monets;  //���� 1� ������


   $minus_komissiya  =   $cena_mon * $komissiya / 100;
    $minus_komissiya = number_format (  $minus_komissiya,8,'.',' ');

   $tot=   $cena_mon *10 / 100;      // zarabotano % posle reinvest
  //  $tot = number_format ( $tot,8,'.',' ');   //��������  � ������� �����  ������� �����  ���� � ����� 0.0000005  E1 33
echo  $out =<<<EOFF

 <tr>     <td class="red"># 0</font></td>
		 <td class="red"> $date   $segodnya </font></td>
		<td><a  href="" target="_blank"><font color="red">$time_reinvest ��� +  ($tot btc.)</font></a></td>
		<td><a  href="" target="_blank"> <font color="red"> $day_vklad</font></a></td>
			 <td class="red">  $order</td>

	 <td class="red">   $cena_mon </td>
    <td class="red">- $minus_komissiya </td>
       <td class="red">  $cena_btc_monets   </td>
	</tr>


EOFF;



  //    ����� ��������� �� ������� � ��������� �� 100= �������  ������.
         $minus_komissiya  =   $cena_mon * $komissiya / 100;


          $time = strtotime($date); // �������� ����



 for($i=0;$i <$day_vklad;$i++)

           {


                        #���� ������ ������� �� ������������ �����

                        $e_day=    date('d', $time) ;
                        $d++;   if($d==7){ $d=0;}
                        $today=  $days2[$d] ;






            $order += ceil($procents* $order); //������� ���������� �����



             $date_day=    date('Y-m-d', $time) ;

            $interval = 1 * 24 * 3600; // ����� ������ � 3 ������
            $time += $interval;

             $cenamonets  =    $order * $cena_monets;    //����� ���� �����.

                //   $cenamonets=ceil( $cenamonets);

                   $minus_komissiya  =  $cenamonets * $komissiya / 100;
                    $minus_komissiya = number_format ( $minus_komissiya,8,'.',' ');   //��������  � ������� �����  ������� �����  ���� � ����� 0.0000005  E1 33


                   $tot2=  $cenamonets  *10 / 100;      // zarabotano % posle reinvest
                  $tot2 = number_format ( $tot2,8,'.',' ');   //��������  � ������� �����  ������� �����  ���� � ����� 0.0000005  E1 33

                         $cenamonets  =    $order * $cena_monets;














       $ix=$i+1;

echo  $out =<<<EOFF
 <tr>   <td># $ix</td>
		<td>$date_day   <font color=$colodnedel>  $today</font></td>
		<td>$time_reinvest ��� + <font color=$color_procent_rub>($tot2 btc.) </font></td>
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