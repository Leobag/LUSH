<?php

class Calendar{
  private $month;
  private $year;
  private $days_of_week;
  private $num_days;
  private $date_info;
  private $day_of_week;

  public function __construct($month, $year, $days_of_week = array('Dom','Lun','Mar','Mier','Jue','Vie','Sab')){
    $this->month = $month;
    $this->year = $year;
    $this->days_of_week = $days_of_week;
    $this->num_days = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
    $this->date_info = getdate(strtotime('Primer dia de', mktime(0, 0, 0, $this->month, 1, $this->year)));
    $this->day_of_week = $this->date_info['wday'];
  }

  public function show(){

    $output = '<table class="calendar row d-flex">';
    $output .= '<caption class="col-12">' . $this->date_info['month'] . ' ' . $this->year .  '</caption>';
    $output .= '<tr class="w-100">';


    foreach($this->days_of_week as $day){
      $output .= '<th class="header">' . $day . '</th>';
    }

    /*for ($i=0; $i < count($this->days_of_week); $i++) {
        $output .= '<th class="header">' . $this->days_of_week[$i] . '<th/>';
    } */

    $output .= '</tr><tr class="w-100">';

    if($this->day_of_week > 0){
      $output .= '<td colspan="' . $this->day_of_week . '"></td>';
    }

    $current_day = 1;

    while($current_day <= $this->num_days){
      if($this->day_of_week == 7){
        $this->day_of_week = 0;
        $output .= '</tr><tr class="w-100">';
      }

      $output .= '<td class="day">' . $current_day . '</td>';

      $current_day++;
      $this->day_of_week++;
    }

    if($this->day_of_week != 7){
      $remaining_days = 7 - $this->day_of_week;
      $output .= '<td colspan="' . $remaining_days . '"></td>';
    }

    $output .= '</tr>';
    $output .= '</table>';

    echo $output;

  }

}
?>
