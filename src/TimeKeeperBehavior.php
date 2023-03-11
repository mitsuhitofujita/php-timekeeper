<?php
declare(strict_types=1);

namespace TimeKeeper;


class TimeKeeperBehavior implements TimeKeeperBehaviorInterface
{
    public function currentMicrosecondsTimestamp(): float
    {
        return microtime(true);
    }
}
