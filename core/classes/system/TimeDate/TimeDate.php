<?php
declare(strict_types = 1);

final class TimeDate {
    
    private Config $Config;


    public function __construct () {
        $this->Config = new Config();
        date_default_timezone_set($this->Config->getConfig('default_timezone'));
    }

    public function getDate () {
        return date($this->Config->getConfig('date_TPL'));
    }

    public function getTime () {
        return date($this->Config->getConfig('time_TPL'));
    }

    public function getTimeZone () {
        return date_default_timezone_get();
    }

    public function calendar () {
        $currentDay = intval(date('d'));
        $m = intval(date('m'));
        $y = intval(date('Y'));
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        echo "<table class = cal>";
        echo "<tr>";
        $d = 1;
        while ($d <= $daysInMonth) {
            $td = "<td>";
            $endTd = "</td>";
            if ($d == $currentDay) {
                $td = "<th>";
                $endTd = "</th>";
            }
            echo ($td.$d.$endTd);
            $d++;
            if ($d == 8 || $d == 15 || $d == 22 || $d == 29) {
                echo "</tr>";
            }
        }
        echo "</tr>";
        echo "<tr><th>$y</th><tr>";
        echo "</table>";
    }
}
