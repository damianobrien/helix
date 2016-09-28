<?php
class Date extends Object {
    
    private $_datetime;
    
    public $year;
    public $month;
    public $day;
    public $hour;
    public $minute;
    public $second;
    
    public function __construct($datetime=null, $timezone=null) {
        if (isset($timezone)) {
            $this->_datetime = new DateTime($datetime ? $datetime : "now", new DateTimeZone($timezone));
        } else {
            try{
                $this->_datetime = new DateTime($datetime ? $datetime : "now");
            } catch (Exception $e){
                debug("Caught invalid Date construction","warning.log");
                //return null;
            }
        }
        $this->setTimestamp($this->getTimestamp());
    }
    
    public static function arrayToString($datetime, $includeTime=true, $includeDate=true) {
        $year = alt(val($datetime, "year"), date("Y"));
        $month = alt(val($datetime, "month"), date("m"));
        $day = alt(val($datetime, "day"), date("d"));
        $hour = alt(val($datetime, "hour"), date("H"));
        $minute = alt(val($datetime, "minute"), date("i"));
        $second = alt(val($datetime, "second"), date("s"));
        
        $datestring = "{$year}-{$month}-{$day}";
        $timestring = "{$hour}:{$minute}:{$second}";
        
        $strings = array();
        
        if ($includeDate) {
            $strings[] =  $datestring;
        }
        if ($includeTime) {
            $strings[] =  $timestring;
        }
        
        $string = implode(" ", $strings); 
        
        return $string;
    }
    
    public static function arrayToDateString($datetime) {
        return self::arrayToString($datetime, false, true);
    }
    
    public static function arrayToTimeString($datetime) {
        return self::arrayToString($datetime, true, false);
    }
    
    public function __toString() {
        return $this->format();
    }
    
    public function format($format="Y-m-d H:i:s") {
        if (isset($this->_datetime)) {
            return $this->_datetime->format($format);
        } else {
            return "";
        }
    }
    
    public static function now($format="Y-m-d H:i:s") {
        return date($format);
    }
    
    public function getDate() {
        return $this->format("Y-m-d");
    }
    
    public function getDateTime() {
        return $this->_datetime;
    }
    
    public function getTime() {
        return $this->format("H:i:s");
    }
    
    public function setDate($year, $month, $day) {
        $this->_datetime = isset($this->_datetime) ? $this->_datetime : new DateTime();
        $this->_datetime->setDate($year, $month, $day);
        $this->setTimestamp($this->getTimestamp());
        return $this;
    }
    
    public function setTime($hour, $minute, $second) {
        $this->_datetime = isset($this->_datetime) ? $this->_datetime : new DateTime();
        $this->_datetime->setTime($hour, $minute, $second);
        $this->setTimestamp($this->getTimestamp());
        return $this;
    }
    
    public function setTimestamp($time) {
        $this->_datetime = isset($this->_datetime) ? $this->_datetime : new DateTime();
        $this->_datetime->setDate(date("Y", $time), date("m", $time), date("d", $time));
        $this->_datetime->setTime(date("H", $time), date("i", $time), date("s", $time));
        $this->year = $this->_datetime->format("Y");
        $this->month = $this->_datetime->format("m");
        $this->day = $this->_datetime->format("d");
        $this->hour = $this->_datetime->format("H");
        $this->minute = $this->_datetime->format("i");
        $this->second = $this->_datetime->format("s");
        return $this;
    }
    
    public function getTimestamp() {
        return isset($this->_datetime) ? strtotime($this->_datetime->format("Y-m-d H:i:s")) : null;
    }
    
    public function setTimezone($timezone) {
        if (isset($this->_datetime)) {
            $this->_datetime->setTimezone(new DateTimeZone($timezone));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function getTimezone() {
        return isset($this->_datetime) ? $this->_datetime->getTimezone()->getName() : null;
    }
    
    public function diff($datetime) {
        if (isset($this->_datetime)) {
            if (is_object($datetime)) {
                $diff = $this->_datetime->diff(new DateTime($this->getTimestamp()));
            } else {
                $date = new Date($datetime);
                $diff = $this->_datetime->diff(new DateTime($date->getTimestamp()));
            }
        }
        return $diff;
    }
    
    public function add($years=0, $months=0, $days=0, $hours=0, $minutes=0, $seconds=0) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("P{$years}Y{$months}M{$days}DT{$hours}H{$minutes}M{$seconds}S"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function addYears($years) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("P{$years}Y"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function addMonths($months) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("P{$months}M"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function addWeeks($weeks) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("P{$weeks}W"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function addDays($days) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("P{$days}D"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function addHours($hours) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("PT{$hours}H"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function addMinutes($minutes) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("PT{$minutes}M"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function addSeconds($seconds) {
        if (isset($this->_datetime)) {
            $this->_datetime->add(new DateInterval("PT{$seconds}S"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtract($years=0, $months=0, $days=0, $hours=0, $minutes=0, $seconds=0) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("P{$years}Y{$months}M{$days}DT{$hours}H{$minutes}M{$seconds}S"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtractYears($years) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("P{$years}Y"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtractMonths($months) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("P{$months}M"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtractWeeks($weeks) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("P{$weeks}W"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtractDays($days) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("P{$days}D"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtractHours($hours) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("PT{$hours}H"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtractMinutes($minutes) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("PT{$minutes}M"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }
    
    public function subtractSeconds($seconds) {
        if (isset($this->_datetime)) {
            $this->_datetime->sub(new DateInterval("PT{$seconds}S"));
            $this->setTimestamp($this->getTimestamp());
        }
        return $this;
    }

    public function age(){
        if(is_null($this->year)||is_null($this->month)||is_null($this->day)){
            return null;
        }
        $date = $this->format("m/d/Y");
        $date = explode("/", $date);
        //return json_encode($date);
        $age = (date("md", date("U", mktime(0, 0, 0, $date[0], $date[1], $date[2]))) > date("md") ? ((date("Y")-$date[2])-1):(date("Y")-$date[2]));
		$months = 0;
        if($age===0){
            $diff = $this->_datetime->diff(new DateTime());
            $months = $diff->format('%m') + 12 * $diff->format('%y');
            $age = ($months>0)?$months." months":0;
        }
         if($age===0 && $months ===0){
         	$diff = $this->_datetime->diff(new DateTime());
         	$days = $diff->format('%d')  +12 * $diff->format('%m') + 12 * $diff->format('%y');
         	$age = ($days>0)?($days===1)?$days." day": $days." days":"";
         }
        return $age;
    }
    
    //Builds a calendar object from a Julian Calendar
    //Julian is the format used by Excel
    public function cal_from_jd($__julian)
    {
        if ($__julian == 60)
        {
            $this->day    = 29;
            $this->month  = 2;
            $this->year   = 1900;
    
            return $this->getDate();
        }
        else if ($__julian < 60)
        {
            // Because of the 29-02-1900 bug, any serial date 
    
            // under 60 is one off... Compensate.
    
            $__julian++;
        }
    
        // Modified Julian to DMY calculation with an addition of 2415019
    
        $l = $__julian + 68569 + 2415019;
        $n = intval(( 4 * $l ) / 146097);
        $l = $l - intval(( 146097 * $n + 3 ) / 4);
        $i = intval(( 4000 * ( $l + 1 ) ) / 1461001);
        $l = $l - intval(( 1461 * $i ) / 4) + 31;
        $j = intval(( 80 * $l ) / 2447);
        $this->day = $l - intval(( 2447 * $j ) / 80);
        $l = intval($j / 11);
        $this->month = $j + 2 - ( 12 * $l );
        $this->year = 100 * ( $n - 49 ) + $i + $l;
        $dtString = $this->month.'/'.$this->day.'/'.$this->year;
        $this->_datetime =  DateTime::createFromFormat('n/j/Y', $dtString);
        return $this->getDate();
    }
    
}
?>