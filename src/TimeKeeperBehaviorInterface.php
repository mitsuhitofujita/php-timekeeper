<?php
declare(strict_types=1);

namespace TimeKeeper;


interface TimeKeeperBehaviorInterface
{
    public function currentMicrosecondsTimestamp(): float;
}
