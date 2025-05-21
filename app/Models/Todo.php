<?php

namespace App\Models;

class Todo {
  public static function list(): array {
    return [
      [
          "name" => "Learn PHP",
          "completed" => true
      ],
      [
          "name" => "Learn Laravel",
          "completed" => true
      ],
      [
          "name" => "Learn MySQL",
          "completed" => false
      ],
    ];
  }
}