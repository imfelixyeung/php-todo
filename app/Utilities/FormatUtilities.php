<?php

namespace App\Utilities;

use DateTime;
use DateTimeZone;

class FormatUtilities
{
  public static function formatDate(DateTime $date)
  {
    $date->setTimezone(new DateTimeZone('Europe/London'));
    return $date->format('d M Y');
  }

  public static function formatLongDate(DateTime $date)
  {
    $date->setTimezone(new DateTimeZone('Europe/London'));
    return $date->format('d M Y H:i');
  }
}
