<?php
declare(strict_types=1);

namespace TimeKeeper;


class TimeKeeper
{
    private TimeKeeperBehaviorInterface $behavior;

    /**
     * @var array<string, float>
     */
    private array $laps = [];

    public function __construct(TimeKeeperBehaviorInterface $behavior = null)
    {
        $this->behavior = $behavior ?? new TimeKeeperBehavior();
    }

    public function measure(string $lapKey, callable $fn)
    {
        $startTime = $this->currentMicrosecondsTimestamp();
        $fn();
        $this->addSecondsToLap($lapKey, $this->calcurateElapsedSeconds($startTime));
    }

    private function currentMicrosecondsTimestamp(): float
    {
        return $this->behavior->currentMicrosecondsTimestamp();
    }

    private function calcurateElapsedSeconds(float $startTime): float
    {
        return $this->currentMicrosecondsTimestamp() - $startTime;
    }

    private function addSecondsToLap(string $lapKey, float $seconds): void
    {
        $this->laps[$lapKey] = ($this->laps[$lapKey] ?? 0.0) + $seconds;
    }
}
