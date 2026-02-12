<?php

namespace Zman\Tefilos;

trait Leining
{
    /**
     * Checks if the day has Krias HaTorah.
     */
    public function hasLeining(?string $minyan = null): bool
    {
        return (bool) $this->leiningAt($minyan);
    }

    /**
     * Determine the leining for a minyan of the day.
     */
    public function leiningAt(?string $minyan): ?string
    {
        if ($minyan === 'shacharis' || $minyan === null) {
            if ($this->isYomKippur()) {
                return 'Yom Kippur';
            }
            if ($this->isPesach()) {
                return 'Pesach';
            }
            if ($this->isShavuos()) {
                return 'Shavuos';
            }
            if ($this->isSukkos()) {
                return 'Sukkos';
            }
            if ($this->isShminiAtzeres()) {
                return 'Shmini Atzeres';
            }
            if ($this->isSimchasTorah()) {
                return 'Simchas Torah';
            }
            if ($this->isRoshHashana()) {
                return 'Rosh Hashana';
            }
            if ($this->isShabbos() && $this->isRoshChodesh()) {
                return $this->parsha.' & Rosh Chodesh';
            }
            if ($this->isShabbos()) {
                return $this->parsha;
            }
            if ($this->isChanuka() && $this->isRoshChodesh()) {
                return 'Rosh Chodesh & Chanuka';
            }
            if ($this->isChanuka()) {
                return 'Chanuka';
            }
            if ($this->isRoshChodesh()) {
                return 'Rosh Chodesh';
            }
            if ($this->isPurim()) {
                return 'Purim';
            }
            if ($this->isTzomGedaliah()
                || $this->isAsaraBiteives()
                || $this->isTaanisEsther()
                || $this->isShivaAsarBitamuz()) {
                return 'Taanis Tzibbur';
            }
            if ($this->isMonday() || $this->isThursday()) {
                return $this->parsha;
            }
        }

        if ($minyan === 'mincha') {
            if ($this->isYomKippur()) {
                return 'Yom Kippur';
            }
            if ($this->isShabbos()) {
                return $this->addWeek()->parsha;
            }
            if ($this->isFastDay()) {
                return 'Taanis Tzibbur';
            }
        }
        return null;
    }
}
