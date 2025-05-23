<?php

namespace App\Utilities;

use DateTime;

class FormatUtilities
{
  public static function formatDate(DateTime $date)
  {
    return $date->format('d M Y');
  }

  public static function formatLongDate(DateTime $date)
  {
    return $date->format('d M Y H:i');
  }
}
