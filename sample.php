<?php
declare(strict_types=1);

require 'vendor/autoload.php';

use TimeKeeper\TimeKeeper;


$timeKeeper = new TimeKeeper();

$timeKeeper->measure('lap_1', function () {
    sleep(1);
});

$timeKeeper->measure('lap_2', function () {
    sleep(2);
});

$timeKeeper->measure('lap_1', function () {
    sleep(1);
});

var_dump($timeKeeper);

/*
/workspaces/php-timekeeper/sample.php:21:
class TimeKeeper\TimeKeeper#4 (2) {
  private TimeKeeper\TimeKeeperBehaviorInterface $behavior =>
  class TimeKeeper\TimeKeeperBehavior#2 (0) {
  }
  private array $laps =>
  array(2) {
    'lap_1' =>
    double(2.0006458759308)
    'lap_2' =>
    double(2.0004770755768)
  }
}
*/
