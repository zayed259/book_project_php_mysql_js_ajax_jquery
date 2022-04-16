<?php
namespace App;
Class CommonFx{
    public static function HumanTime($date){
        $date2 = date("Y-m-d H:i:s");
        $diff = abs(strtotime($date2) - strtotime($date));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
        $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
        $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));
        $difference = $years . " years, " . $months . " months, " . $days . " days, " . $hours . " hours, " . $minutes . " minutes, " . $seconds . " seconds";
        if ($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes == 0 && $seconds == 0) {
            $difference = "Just Now";
        } elseif ($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes == 0) {
            $difference = $seconds . " seconds ago";
        } elseif ($years == 0 && $months == 0 && $days == 0 && $hours == 0) {
            $difference = $minutes . " minutes ago";
        } elseif ($years == 0 && $months == 0 && $days == 0) {
            $difference = $hours . " hours ago";
        } elseif ($years == 0 && $months == 0) {
            $difference = $days . " days ago";
        } elseif ($years == 0) {
            $difference = $months . " months ago";
        } else {
            $difference = $years . " years ago";
        }
        return $difference;
    }
}