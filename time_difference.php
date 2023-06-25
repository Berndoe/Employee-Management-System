<?php


/**
 * This function calculates the time difference between 
 * current time and the time a table has been modified
 */
function timeDifference($current_time, string $query) {
    include "config.php";
    $time_var = ''; // to determine which query is being used 

    $query_result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_result);

    if(strpos($query, "insert_time"))  {
        $time_var = 'insert_time';
    }
    elseif (strpos($query, "payment_status_update_time")) {
        $time_var = 'payment_status_update_time';  
    }
    else {
        $time_var = 'asset_update_time';
    }

    $time = new DateTime($row[$time_var], new DateTimeZone("UTC"));
    $time_difference = $current_time->diff($time);

    $seconds = (int) $time_difference->format('%S');
    $minutes = (int) $time_difference->format('%I');
    $hours = (int) $time_difference->format('%H');

    $days = (int) $time_difference->format('%D');

    $weeks = (int) floor($days / 7); 
    $months = (int) $time_difference->format('%M');
    $years = (int) $time_difference->format('%Y');


    return [$seconds, $minutes, $hours, $days, $weeks, $months, $years];

}

/**
 * This function shows the last time a table was modified
 * under the cards in the home page
 */
function timeToDisplay($seconds, $minutes, $hours, $days, $weeks, $months, $years) {
    $statement = "";

    // seconds statement
    if ($hours == 0 && $minutes == 0 &&
     $days == 0 && $weeks == 0 && $months == 0 && 
     $years == 0 && $seconds > 0)
    {
        $statement = "Last updated $seconds second ago";

        if($seconds !== 1) {
            $statement = str_replace('second', 'seconds', $statement);
        }
    }

    // minutes statement
    elseif ($minutes > 0 && $hours == 0 && $days == 0
     && $weeks == 0 && $months == 0 && $years == 0)
    {
        $statement = "Last updated $minutes minute ago";

        if($minutes !== 1) {
            $statement = str_replace('minute', 'minutes', $statement);
        }
    } 

    // hours statement
    elseif($hours > 0 and $hours < 24 && $days == 0 
    && $weeks == 0 && $months == 0 && $years == 0)
    {
        $statement = "Last updated $hours hour ago";

        if($hours !== 1) {
            $statement = str_replace('hour', 'hours', $statement);
        }
    }

    // days statement
    elseif($days > 0 && $days <= 6 && $weeks == 0 && $months == 0 && $years == 0) {
        $statement = "Last updated $days day ago";

        if($days !== 1) {
            $statement = str_replace('day', 'days', $statement);
        }
    }

    // weeks statement
    if($weeks > 0 && $weeks < 4 && $months == 0 && $years == 0) {
        $statement = "Last updated $weeks week ago";

        if($weeks !== 1) {
            $statement = str_replace('week', 'weeks', $statement);
        }
    } 
    
    // months statement
    elseif($months > 0 && $months < 12 && $years == 0) {
        $statement = "Last updated $months month ago";

        if($months !== 1) {
            $statement = str_replace('month', 'months', $statement);
        }
    }

    // years statement
    elseif($years > 1) {
        $statement = "Last updated $years year ago";

        if($years !== 1) {
            $statement = str_replace('year', 'years', $statement);
        }

    }
    return $statement;
}


function determineTimeDisplay(string $query) {
        
    $current_time = new DateTime("now", new DateTimeZone("UTC"));

    $seconds = timeDifference($current_time, $query)[0];
    $minutes = timeDifference($current_time, $query)[1];
    $hours = timeDifference($current_time, $query)[2];

    $days = timeDifference($current_time, $query)[3];
    
    $weeks = timeDifference($current_time, $query)[4];

    $months = timeDifference($current_time, $query)[5];
    
    $years = timeDifference($current_time, $query)[6];
    

return timeToDisplay($seconds, $minutes, $hours, $days, $weeks, $months, $years);

}

?>