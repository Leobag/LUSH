<?php

function build_calendar($month, $year){


   $daysOfWeek = array('Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab');

   $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);


   $numberOfDays = date('t', $firstDayOfMonth);

   $dateComponents = getdate($firstDayOfMonth);

   $monthName = $dateComponents['month'];

   $dayOfWeek = $dateComponents['wday'];

   $dateToday = date('Y-m-d');


   $calendar = '<table class="table table-bordered">';
   $calendar .= "<center><h2> $monthName $year </h2>";


    $calendar .= '<a class="collapsebtn btn btn-xs" href="?month='.date('m', mktime(0, 0, 0, $month-1, 1, $year)).'&year='.date('Y',  mktime(0, 0, 0, $month-1, 1, $year)).'"><i class="fas fa-arrow-left"></i></a>';

    $calendar .= '<a class="collapsebtn btn btn-xs" href="?month='.date('m').'&year='.date('Y').'">Mes actual</a>';

    $calendar .= '<a class="collapsebtn btn btn-xs" href="?month='.date('m', mktime(0, 0, 0, $month+1, 1, $year)).'&year='.date('Y', mktime(0, 0, 0, $month+1, 1, $year)).'"> <i class="fas fa-arrow-right"></i></a></center>';


   $calendar .= "<tr>";

   foreach($daysOfWeek as $day){
     $calendar .= '<th class="header">' . $day . '</th>';
   }

   $calendar .= '</tr><tr>';

    if($dayOfWeek > 0){
      for ($i=0; $i < $dayOfWeek; $i++) {
        $calendar .= '<td></td>';
      }
    }

    $currentDay = 1;

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while($currentDay <= $numberOfDays){

      if($dayOfWeek == 7){
        $dayOfWeek = 0;
        $calendar.= '</tr><tr>';
      }

      $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
      $date = "$year-$month-$currentDayRel";
      $eventNum = 0;

      $today = $date ==date('Y-m-d')?"today" : "";

      if($date < date('Y-m-d')){
      $calendar .= '<td class="unavailable-day"> <span class="cross"></span> <h4>' . $currentDay . '</h4></td>';
    } else{
     $calendar .= '<td class="available-day"> <a href="productoNEW.php?datefrom='.$date.'"> <h4>' . $currentDay . '</h4></a></td>';

    }

      $currentDay++;
      $dayOfWeek++;
    }

    if($dayOfWeek != 7){
      $remainingDays = 7 - $dayOfWeek;
      for ($i=0; $i < $remainingDays; $i++) {
        $calendar .= '<td></td>';
      }
    }

    $calendar .= '</tr>';
    $calendar .= '</table>';

    echo $calendar;
}



 ?>
