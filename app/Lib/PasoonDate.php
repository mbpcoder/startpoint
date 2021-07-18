<?php namespace App\Lib;
class PasoonDate
{
    private $_5f4e58f21878 = 2440587.5;
    private $_6ef116e8c3d4;
    private $_b23ae63ddc5a;
    private $_78461a2e5f3d;
    private $_f699a435a3cb;
    private $_45dfbddc2a8b;
    private $_96fc75e23061;
    private $_58b2d5bb2a06;

    /**
     * PasoonDate constructor.
     */
    public function __construct()
    {
        $this->gregorian(date('Y'), date('m'), date('d'), date('H'), date('i'), date('s'));
    }

    /**
     * @param bool|int $year
     * @param bool|int $month
     * @param bool|int $day
     * @param bool|int $hours
     * @param bool|int $minute
     * @param bool|int $second
     * @return GregorianDate
     */
    public function gregorian($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        if (empty($this->_b23ae63ddc5a) or $_66478dec0b8e) {
            $this->_b23ae63ddc5a = new GregorianDate($this, $_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
        }
        return $this->_b23ae63ddc5a;
    }

    public function setTimestamp($_4d5f86230f9e)
    {
        $this->setJulianDayNumber((int)($this->_5f4e58f21878 + floor($_4d5f86230f9e / (60 * 60 * 24))));
        $_e75bb2f8fc15 = $this->julianTimeToTime((int)($this->_5f4e58f21878 + ($_4d5f86230f9e / (60 * 60 * 24))));
        $this->setHours($_e75bb2f8fc15[0]);
        $this->setMinute($_e75bb2f8fc15[1]);
        $this->setSecond($_e75bb2f8fc15[2]);
    }

    public function setJulianDayNumber($_9cdf67da7b34)
    {
        $this->_f699a435a3cb = $_9cdf67da7b34;
    }

    private function julianTimeToTime($_845956395732)
    {
        $_845956395732 += 0.5;
        $_4a352f6e0fbc = (($_845956395732 - floor($_845956395732)) * 86400.0) + 0.5;
        return [floor($_4a352f6e0fbc / 3600), floor(($_4a352f6e0fbc / 60) % 60), floor($_4a352f6e0fbc % 60)];
    }

    /**
     * @param mixed $hours
     */
    public function setHours($_45dfbddc2a8b)
    {
        $this->_45dfbddc2a8b = (int)$_45dfbddc2a8b;
    }

    /**
     * @param mixed $minute
     */
    public function setMinute($_96fc75e23061)
    {
        $this->_96fc75e23061 = (int)$_96fc75e23061;
    }

    /**
     * @param mixed $second
     */
    public function setSecond($_58b2d5bb2a06)
    {
        $this->_58b2d5bb2a06 = (int)$_58b2d5bb2a06;
    }

    public function getTimestamp()
    {
        $_4d5f86230f9e = ($this->getJulianDayNumber() - $this->_5f4e58f21878) * (60 * 60 * 24 * 1000);
        return ($this->getHours() * 60 * 60 + $this->getMinute() * 60 + $this->getSecond()) + round($_4d5f86230f9e / 1000);
    }

    public function getJulianDayNumber()
    {
        return $this->_f699a435a3cb;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->_45dfbddc2a8b;
    }

    /**
     * @return mixed
     */
    public function getMinute()
    {
        return $this->_96fc75e23061;
    }

    /**
     * @return mixed
     */
    public function getSecond()
    {
        return $this->_58b2d5bb2a06;
    }

    /**
     * @param bool|int $year
     * @param bool|int $month
     * @param bool|int $day
     * @param bool|int $hours
     * @param bool|int $minute
     * @param bool|int $second
     * @return JalaliDate
     */
    public function jalali($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        if (empty($this->_6ef116e8c3d4) or $_66478dec0b8e) $this->_6ef116e8c3d4 = new JalaliDate($this, $_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
        return $this->_6ef116e8c3d4;
    }

    /**
     * @param bool|int $year
     * @param bool|int $month
     * @param bool|int $day
     * @param bool|int $hours
     * @param bool|int $minute
     * @param bool|int $second
     * @return IslamicDate
     */
    public function islamic($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        if (empty($this->_78461a2e5f3d) or $_66478dec0b8e) $this->_78461a2e5f3d = new IslamicDate($this, $_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
        return $this->_78461a2e5f3d;
    }
}

class AbstractPasoonDate
{
    protected function dayOfWeek($_f699a435a3cb)
    {
        return $this->mod(floor(($_f699a435a3cb + 1.5)), 7);
    }

    protected function mod($_0673f5e4d640, $_42ef2c12cb21)
    {
        return $_0673f5e4d640 - ($_42ef2c12cb21 * floor($_0673f5e4d640 / $_42ef2c12cb21));
    }
}

class GregorianDate extends AbstractPasoonDate
{
    private $_204c5d80a9ff = 1721425.5;
    private $_c71c68ec64cd;

    /**
     * @param PasoonDate $pasoonDate
     * @param            $year
     * @param            $month
     * @param            $day
     * @param            $hours
     * @param            $minute
     * @param            $second
     */
    public function __construct($_c71c68ec64cd, $_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06)
    {
        $this->_c71c68ec64cd = $_c71c68ec64cd;
        if ($_66478dec0b8e and $_0f91aa8e53a2 and $_dd8a6e754b38) {
            $_c71c68ec64cd->setHours(isset($_45dfbddc2a8b) ? $_45dfbddc2a8b : date('H'));
            $_c71c68ec64cd->setMinute(isset($_96fc75e23061) ? $_96fc75e23061 : date('i'));
            $_c71c68ec64cd->setSecond(isset($_58b2d5bb2a06) ? $_58b2d5bb2a06 : date('s'));
            $_c71c68ec64cd->setJulianDayNumber($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38));
        }
    }

    private function toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38)
    {
        return ($this->_204c5d80a9ff - 1) + (365 * ($_66478dec0b8e - 1)) + floor(($_66478dec0b8e - 1) / 4) + (-floor(($_66478dec0b8e - 1) / 100)) + floor(($_66478dec0b8e - 1) / 400) + floor((((367 * $_0f91aa8e53a2) - 362) / 12) + (($_0f91aa8e53a2 <= 2) ? 0 : ($this->isLeap($_66478dec0b8e) ? -1 : -2)) + $_dd8a6e754b38);
    }

    private function isLeap($_66478dec0b8e)
    {
        return (($_66478dec0b8e % 4) == 0) && (!((($_66478dec0b8e % 100) == 0) && (($_66478dec0b8e % 400) != 0)));
    }

    public function startDayOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        return $this->dayOfWeek($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, 1));
    }

    public function lastDayOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        return $this->dayOfWeek($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $this->daysOfMonth($_66478dec0b8e, $_0f91aa8e53a2)));
    }

    public function daysOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        $_9fa4eff925ef = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($_0f91aa8e53a2 < 1 || $_0f91aa8e53a2 > 12) {
            throw new Exception("$_0f91aa8e53a2 Out Of Range Exception");
        }
        if ($_66478dec0b8e && $this->isLeap($_66478dec0b8e) && $_0f91aa8e53a2 == 2) {
            return 29;
        }
        return $_9fa4eff925ef[$_0f91aa8e53a2 - 1];
    }

    public function get()
    {
        $_ca031473db71 = $this->toGregorian();
        $_3dff1a6de3d7 = new PasoonDateTime($this->_c71c68ec64cd->getTimestamp(), $this->_c71c68ec64cd->getJulianDayNumber(), $_ca031473db71[0], $_ca031473db71[1], $_ca031473db71[2], $this->_c71c68ec64cd->getHours(), $this->_c71c68ec64cd->getMinute(), $this->_c71c68ec64cd->getSecond(), $this->nameOfDay($this->dayOfWeek($this->_c71c68ec64cd->getJulianDayNumber())), $this->nameOfDay($this->dayOfWeek($this->_c71c68ec64cd->getJulianDayNumber()), true), $this->monthName($_ca031473db71[1]), $this->monthName($_ca031473db71[1], true));
        return $_3dff1a6de3d7;
    }

    private function toGregorian()
    {
        $_d6491f1797a3 = $this->_c71c68ec64cd->getJulianDayNumber();
        $_c35ba18d8f9b = floor($_d6491f1797a3 - 0.5) + 0.5;
        $_40bb11305604 = $_c35ba18d8f9b - $this->_204c5d80a9ff;
        $_cf3a228d2155 = floor($_40bb11305604 / 146097);
        $_14e6b4c17864 = $this->mod($_40bb11305604, 146097);
        $_c4fef01a22f5 = floor($_14e6b4c17864 / 36524);
        $_055401d2c830 = $this->mod($_14e6b4c17864, 36524);
        $_b47204f9f294 = floor($_055401d2c830 / 1461);
        $_3c31bb05ea77 = $this->mod($_055401d2c830, 1461);
        $_b74222671e9f = floor($_3c31bb05ea77 / 365);
        $_66478dec0b8e = ($_cf3a228d2155 * 400) + ($_c4fef01a22f5 * 100) + ($_b47204f9f294 * 4) + $_b74222671e9f;
        if (!(($_c4fef01a22f5 == 4) || ($_b74222671e9f == 4))) {
            $_66478dec0b8e++;
        }
        $_004caa87b977 = $_c35ba18d8f9b - $this->toJulianDayNumber($_66478dec0b8e, 1, 1);
        $_f4532070ec57 = (($_c35ba18d8f9b < $this->toJulianDayNumber($_66478dec0b8e, 3, 1)) ? 0 : ($this->isLeap($_66478dec0b8e) ? 1 : 2));
        $_0f91aa8e53a2 = floor(((($_004caa87b977 + $_f4532070ec57) * 12) + 373) / 367);
        $_dd8a6e754b38 = ($_c35ba18d8f9b - $this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, 1)) + 1;
        return [$_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38];
    }

    public function nameOfDay($_7a6dfcd15c78, $_7639d346d4a8 = false)
    {
        $_98168c683ea9 = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        if ($_7a6dfcd15c78 < 0 || $_7a6dfcd15c78 > 6) {
            throw new Exception("$_7a6dfcd15c78 Out Of Range Exception");
        }
        if ($_7639d346d4a8) {
            return substr($_98168c683ea9[$_7a6dfcd15c78], 0, 3);
        }
        return $_98168c683ea9[$_7a6dfcd15c78];
    }

    public function monthName($_0f91aa8e53a2, $_7639d346d4a8 = false)
    {
        $_98168c683ea9 = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        if (empty($_0f91aa8e53a2)) {
            return $_98168c683ea9;
        }
        if ($_0f91aa8e53a2 < 1 || $_0f91aa8e53a2 > 12) {
            throw new Exception("$_0f91aa8e53a2 Out Of Range Exception");
        }
        if ($_7639d346d4a8) {
            return substr($_98168c683ea9[$_0f91aa8e53a2 - 1], 0, 3);
        }
        return $_98168c683ea9[$_0f91aa8e53a2 - 1];
    }

    public function islamic($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        return $this->_c71c68ec64cd->islamic($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
    }

    public function jalali($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        return $this->_c71c68ec64cd->jalali($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
    }
}

class IslamicDate extends AbstractPasoonDate
{
    private $_334d19fd6112 = 1948439.5;
    private $_c71c68ec64cd;

    /**
     * @param PasoonDate $pasoonDate
     * @param            $year
     * @param            $month
     * @param            $day
     * @param            $hours
     * @param            $minute
     * @param            $second
     */
    public function __construct($_c71c68ec64cd, $_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06)
    {
        $this->_c71c68ec64cd = $_c71c68ec64cd;
        if ($_66478dec0b8e and $_0f91aa8e53a2 and $_dd8a6e754b38) {
            $_c71c68ec64cd->setHours(isset($_45dfbddc2a8b) ? $_45dfbddc2a8b : date('H'));
            $_c71c68ec64cd->setMinute(isset($_96fc75e23061) ? $_96fc75e23061 : date('i'));
            $_c71c68ec64cd->setSecond(isset($_58b2d5bb2a06) ? $_58b2d5bb2a06 : date('s'));
            $_c71c68ec64cd->setJulianDayNumber($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38));
        }
    }

    private function toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38)
    {
        return ($_dd8a6e754b38 + ceil(29.5 * ($_0f91aa8e53a2 - 1)) + ($_66478dec0b8e - 1) * 354 + floor((3 + (11 * $_66478dec0b8e)) / 30) + $this->_334d19fd6112) - 1;
    }

    public function startDayOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        return $this->dayOfWeek($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, 1));
    }

    public function lastDayOfMonth($_66478dec0b8e, $_0f91aa8e53a2, $_dce0b3a7b17a)
    {
        if (isset($_dce0b3a7b17a)) {
            return $this->dayOfWeek($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $this->daysOfShiaMonth($_66478dec0b8e, $_0f91aa8e53a2)));
        }
        return $this->dayOfWeek($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $this->daysOfMonth($_66478dec0b8e, $_0f91aa8e53a2)));
    }

    public function daysOfShiaMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        $_9fa4eff925ef = array(1435 => array(29, 30, 29, 30, 29, 30, 29, 30, 30, 30, 29, 30), 1436 => array(29, 30, 29, 29, 30, 29, 30, 29, 30, 29, 30, 30), 1437 => array(29, 30, 30, 29, 30, 29, 29, 30, 29, 29, 30, 30));
        if ($_0f91aa8e53a2 < 1 || $_0f91aa8e53a2 > 12) {
            throw new Exception("$_0f91aa8e53a2 Out Of Range Exception");
        }
        return $_9fa4eff925ef[$_66478dec0b8e][$_0f91aa8e53a2 - 1];
    }

    public function daysOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        $_9fa4eff925ef = array(30, 29, 30, 29, 30, 29, 30, 29, 30, 29, 30, 29);
        if ($_0f91aa8e53a2 < 1 || $_0f91aa8e53a2 > 12) {
            throw new Exception("$_0f91aa8e53a2 Out Of Range Exception");
        }
        if ($_66478dec0b8e && $this->isLeap($_66478dec0b8e) && $_0f91aa8e53a2 == 12) {
            return 30;
        }
        return $_9fa4eff925ef[$_0f91aa8e53a2 - 1];
    }

    private function isLeap($_66478dec0b8e)
    {
        return ((($_66478dec0b8e * 11) + 14) % 30) < 11;
    }

    public function get($_dce0b3a7b17a = true)
    {
        $_ca031473db71 = $this->toIslamic();
        if (isset($_dce0b3a7b17a)) {
            $_ca031473db71 = $this->toShia();
        }
        $_3dff1a6de3d7 = new PasoonDateTime($this->_c71c68ec64cd->getTimestamp(), $this->_c71c68ec64cd->getJulianDayNumber(), $_ca031473db71[0], $_ca031473db71[1], $_ca031473db71[2], $this->_c71c68ec64cd->getHours(), $this->_c71c68ec64cd->getMinute(), $this->_c71c68ec64cd->getSecond(), $this->nameOfDay($this->dayOfWeek($this->_c71c68ec64cd->getJulianDayNumber())), $this->nameOfDay($this->dayOfWeek($this->_c71c68ec64cd->getJulianDayNumber()), true), $this->monthName($_ca031473db71[1]), $this->monthName($_ca031473db71[1], true));
        return $_3dff1a6de3d7;
    }

    private function toIslamic()
    {
        $_d6491f1797a3 = $this->_c71c68ec64cd->getJulianDayNumber();
        $_d6491f1797a3 = floor($_d6491f1797a3) + 0.5;
        $_66478dec0b8e = floor(((30 * ($_d6491f1797a3 - $this->_334d19fd6112)) + 10646) / 10631);
        $_0f91aa8e53a2 = min(12, ceil(($_d6491f1797a3 - (29 + $this->toJulianDayNumber($_66478dec0b8e, 1, 1))) / 29.5) + 1);
        $_dd8a6e754b38 = $_d6491f1797a3 - $this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, 1) + 1;
        return [$_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38];
    }

    private function toShia()
    {
        $_78461a2e5f3d = $this->toIslamic();
        $_db0b9926b560 = $this->daysOfMonth($_78461a2e5f3d[0], $_78461a2e5f3d[1]);
        $_a4bb083f65c6 = $this->daysOfShiaMonth($_78461a2e5f3d[0], $_78461a2e5f3d[1]);
        if ($_78461a2e5f3d[2] == $_db0b9926b560 && ($_db0b9926b560 - $_a4bb083f65c6) > 0) {
            $_78461a2e5f3d[2] = $_db0b9926b560 - $_a4bb083f65c6;
            $_78461a2e5f3d[1]++;
            if ($_78461a2e5f3d[1] > 12) {
                $_78461a2e5f3d[1] = 1;
                $_78461a2e5f3d[0]++;
            }
            return $_78461a2e5f3d;
        }
        $_658f8664b206 = $this->daysDifOfShiaMonth($_78461a2e5f3d[0], $_78461a2e5f3d[1]);
        if ($_658f8664b206 > 0) {
            $_78461a2e5f3d[2] += $_658f8664b206;
        }
        return $_78461a2e5f3d;
    }

    private function daysDifOfShiaMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        $_9fa4eff925ef = array(1435 => array(0, 1, 0, 1, 0, 1, 0, 1, 0, 0, -1, 0), 1436 => array(0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1), 1437 => array(0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1));
        return $_9fa4eff925ef[$_66478dec0b8e][$_0f91aa8e53a2 - 1];
    }

    public function nameOfDay($_7a6dfcd15c78, $_7639d346d4a8 = false)
    {
        $_98168c683ea9 = ["الأحد", "الاثنین", "الثلاثاء", "الأربعاء", "الخمیس", "الجمعة", "السبت"];
        $_a11cf709558d = ["ح", "ن", "ث", "ر", "خ", "ج", "س"];
        if ($_7a6dfcd15c78 < 0 || $_7a6dfcd15c78 > 6) {
            throw new Exception("$_7a6dfcd15c78 Out Of Range Exception");
        }
        if ($_7639d346d4a8) {
            return $_a11cf709558d[$_7a6dfcd15c78];
        }
        return $_98168c683ea9[$_7a6dfcd15c78];
    }

    public function monthName($_0f91aa8e53a2)
    {
        $_98168c683ea9 = ["محرم", "صفر", "ربیع الاول", "ربیع الثانی", "جمادی الاول", "جمادی الثانی", "رجب", "شعبان", "رمضان", "شوال", "ذی‌القعده", "ذی‌الحجه"];
        if (empty($_0f91aa8e53a2)) {
            return $_98168c683ea9;
        }
        if ($_0f91aa8e53a2 < 1 || $_0f91aa8e53a2 > 12) {
            throw new Exception("$_0f91aa8e53a2 Out Of Range Exception");
        }
        return $_98168c683ea9[$_0f91aa8e53a2 - 1];
    }

    public function gregorian($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        return $this->_c71c68ec64cd->gregorian($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
    }

    public function jalali($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        return $this->_c71c68ec64cd->jalali($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
    }
}

class JalaliDate extends AbstractPasoonDate
{
    private $_f2d8bc99ef80 = 1948320.5;
    private $_c71c68ec64cd;

    /**
     * @param PasoonDate $pasoonDate
     * @param            $year
     * @param            $month
     * @param            $day
     * @param            $hours
     * @param            $minute
     * @param            $second
     */
    public function __construct($_c71c68ec64cd, $_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06)
    {
        $this->_c71c68ec64cd = $_c71c68ec64cd;
        if ($_66478dec0b8e and $_0f91aa8e53a2 and $_dd8a6e754b38) {
            $_c71c68ec64cd->setHours(isset($_45dfbddc2a8b) ? $_45dfbddc2a8b : date('H'));
            $_c71c68ec64cd->setMinute(isset($_96fc75e23061) ? $_96fc75e23061 : date('i'));
            $_c71c68ec64cd->setSecond(isset($_58b2d5bb2a06) ? $_58b2d5bb2a06 : date('s'));
            $_c71c68ec64cd->setJulianDayNumber($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38));
        }
    }

    private function toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38)
    {
        $_b06c08dcd7c2 = $_66478dec0b8e - (($_66478dec0b8e >= 0) ? 474 : 473);
        $_51422b0449db = 474 + $this->mod($_b06c08dcd7c2, 2820);
        return $_dd8a6e754b38 + (($_0f91aa8e53a2 <= 7) ? (($_0f91aa8e53a2 - 1) * 31) : ((($_0f91aa8e53a2 - 1) * 30) + 6)) + floor((($_51422b0449db * 682) - 110) / 2816) + ($_51422b0449db - 1) * 365 + floor($_b06c08dcd7c2 / 2820) * 1029983 + ($this->_f2d8bc99ef80 - 1);
    }

    public function startDayOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        return $this->dayOfWeek($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, 1));
    }

    public function lastDayOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        return $this->dayOfWeek($this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, $this->daysOfMonth($_66478dec0b8e, $_0f91aa8e53a2)));
    }

    public function daysOfMonth($_66478dec0b8e, $_0f91aa8e53a2)
    {
        $_9fa4eff925ef = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
        if ($_0f91aa8e53a2 < 1 || $_0f91aa8e53a2 > 12) {
            throw new Exception("$_0f91aa8e53a2 Out Of Range Exception");
        }
        if ($_66478dec0b8e && $this->isLeap($_66478dec0b8e) && $_0f91aa8e53a2 == 12) {
            return 30;
        }
        return $_9fa4eff925ef[$_0f91aa8e53a2 - 1];
    }

    private function isLeap($_66478dec0b8e)
    {
        return (((((($_66478dec0b8e - (($_66478dec0b8e > 0) ? 474 : 473)) % 2820) + 474) + 38) * 682) % 2816) < 682;
    }

    public function get()
    {
        $_ca031473db71 = $this->toJalali();
        $_3dff1a6de3d7 = new PasoonDateTime($this->_c71c68ec64cd->getTimestamp(), $this->_c71c68ec64cd->getJulianDayNumber(), $_ca031473db71[0], $_ca031473db71[1], $_ca031473db71[2], $this->_c71c68ec64cd->getHours(), $this->_c71c68ec64cd->getMinute(), $this->_c71c68ec64cd->getSecond(), $this->nameOfDay($this->dayOfWeek($this->_c71c68ec64cd->getJulianDayNumber())), $this->nameOfDay($this->dayOfWeek($this->_c71c68ec64cd->getJulianDayNumber()), true), $this->monthName($_ca031473db71[1]), $this->monthName($_ca031473db71[1], true));
        return $_3dff1a6de3d7;
    }

    private function toJalali()
    {
        $_d6491f1797a3 = $this->_c71c68ec64cd->getJulianDayNumber();
        $_66478dec0b8e = $_0f91aa8e53a2 = $_dd8a6e754b38 = $_40bb11305604 = $_a9d37400bb80 = $_98af7e256d57 = $_f612c91aafb0 = $_a3103259c951 = $_fb51e2134d97 = $_2cd4e4a210ee = 0;
        $_d6491f1797a3 = floor($_d6491f1797a3) + 0.5;
        $_40bb11305604 = $_d6491f1797a3 - $this->toJulianDayNumber(475, 1, 1);
        $_a9d37400bb80 = floor($_40bb11305604 / 1029983);
        $_98af7e256d57 = $this->mod($_40bb11305604, 1029983);
        if ($_98af7e256d57 == 1029982) {
            $_f612c91aafb0 = 2820;
        } else {
            $_a3103259c951 = floor($_98af7e256d57 / 366);
            $_fb51e2134d97 = $this->mod($_98af7e256d57, 366);
            $_f612c91aafb0 = floor(((2134 * $_a3103259c951) + (2816 * $_fb51e2134d97) + 2815) / 1028522) + $_a3103259c951 + 1;
        }
        $_66478dec0b8e = $_f612c91aafb0 + (2820 * $_a9d37400bb80) + 474;
        if ($_66478dec0b8e <= 0) {
            $_66478dec0b8e--;
        }
        $_2cd4e4a210ee = ($_d6491f1797a3 - $this->toJulianDayNumber($_66478dec0b8e, 1, 1)) + 1;
        $_0f91aa8e53a2 = ($_2cd4e4a210ee <= 186) ? ceil($_2cd4e4a210ee / 31) : ceil(($_2cd4e4a210ee - 6) / 30);
        $_dd8a6e754b38 = ($_d6491f1797a3 - $this->toJulianDayNumber($_66478dec0b8e, $_0f91aa8e53a2, 1)) + 1;
        return [$_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38];
    }

    public function nameOfDay($_7a6dfcd15c78, $_7639d346d4a8 = false)
    {
        $_98168c683ea9 = ["یک شنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه", "شنبه"];
        if ($_7a6dfcd15c78 < 0 || $_7a6dfcd15c78 > 6) {
            throw new Exception("$_7a6dfcd15c78 Out Of Range Exception");
        }
        if ($_7639d346d4a8) {
            return substr($_98168c683ea9[$_7a6dfcd15c78], 0, 2);
        }
        return $_98168c683ea9[$_7a6dfcd15c78];
    }

    public function monthName($_0f91aa8e53a2)
    {
        $_98168c683ea9 = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
        if (empty($_0f91aa8e53a2)) {
            return $_98168c683ea9;
        }
        if ($_0f91aa8e53a2 < 1 || $_0f91aa8e53a2 > 12) {
            throw new Exception("$_0f91aa8e53a2 Out Of Range Exception");
        }
        return $_98168c683ea9[$_0f91aa8e53a2 - 1];
    }

    public function gregorian($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        return $this->_c71c68ec64cd->gregorian($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
    }

    public function islamic($_66478dec0b8e = false, $_0f91aa8e53a2 = false, $_dd8a6e754b38 = false, $_45dfbddc2a8b = false, $_96fc75e23061 = false, $_58b2d5bb2a06 = false)
    {
        return $this->_c71c68ec64cd->islamic($_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_45dfbddc2a8b, $_96fc75e23061, $_58b2d5bb2a06);
    }
}

class PasoonDateTime
{
    private $_4d5f86230f9e;
    private $_89dc56d343ba;
    private $_66478dec0b8e;
    private $_0f91aa8e53a2;
    private $_dd8a6e754b38;
    private $_413cb80de3a1;
    private $_96fc75e23061;
    private $_58b2d5bb2a06;
    private $_cbfd7c9a4508;
    private $_ca000113b866;
    private $_54e8e97a680e;
    private $_3011e40ff38d;

    public function __construct($_4d5f86230f9e, $_89dc56d343ba, $_66478dec0b8e, $_0f91aa8e53a2, $_dd8a6e754b38, $_413cb80de3a1, $_96fc75e23061, $_58b2d5bb2a06, $_cbfd7c9a4508, $_ca000113b866, $_54e8e97a680e, $_3011e40ff38d)
    {
        $this->_4d5f86230f9e = $_4d5f86230f9e;
        $this->_89dc56d343ba = $_89dc56d343ba;
        $this->_66478dec0b8e = $_66478dec0b8e;
        $this->_0f91aa8e53a2 = $_0f91aa8e53a2;
        $this->_dd8a6e754b38 = $_dd8a6e754b38;
        $this->_413cb80de3a1 = $_413cb80de3a1;
        $this->_96fc75e23061 = $_96fc75e23061;
        $this->_58b2d5bb2a06 = $_58b2d5bb2a06;
        $this->_cbfd7c9a4508 = $_cbfd7c9a4508;
        $this->_ca000113b866 = $_ca000113b866;
        $this->_54e8e97a680e = $_54e8e97a680e;
        $this->_3011e40ff38d = $_3011e40ff38d;
    }

    /**
     * @param $pattern
     * @return string
     */
    public function format($_037c64a7053b)
    {
        $_e0fb9750ec9a = $_037c64a7053b;
        $_e0fb9750ec9a = str_replace('%Day%', $this->leadingZeros($this->_dd8a6e754b38), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%day%', $this->_dd8a6e754b38, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace(array('%day:name:short%', '%Day:name:short%'), $this->_ca000113b866, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace(array('%day:name%', '%Day:name%'), $this->_cbfd7c9a4508, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace(array('%month:name%', '%Month:name%'), $this->_54e8e97a680e, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace(array('%month:name:short%', '%Month:name:short%'), $this->_3011e40ff38d, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%Month%', $this->leadingZeros($this->_0f91aa8e53a2), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%month%', $this->_0f91aa8e53a2, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%Year%', $this->_66478dec0b8e, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%year%', substr($this->_66478dec0b8e, 2), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('meridiem', ($this->_413cb80de3a1 > 12 ? 'pm' : 'am'), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('Meridiem', ($this->_413cb80de3a1 > 12 ? 'PM' : 'pm'), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%hour:12%', ($this->_413cb80de3a1 > 12 ? $this->_413cb80de3a1 - 12 : $this->_413cb80de3a1), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%hour%', $this->_413cb80de3a1, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%Hour:12%', $this->leadingZeros(($this->_413cb80de3a1 > 12 ? $this->_413cb80de3a1 - 12 : $this->_413cb80de3a1)), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%Hour%', $this->leadingZeros($this->_413cb80de3a1), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%minute%', $this->_96fc75e23061, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%Minute%', $this->leadingZeros($this->_96fc75e23061), $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%second%', $this->_58b2d5bb2a06, $_e0fb9750ec9a);
        $_e0fb9750ec9a = str_replace('%Second%', $this->leadingZeros($this->_58b2d5bb2a06), $_e0fb9750ec9a);
        return $_e0fb9750ec9a;
    }

    private function leadingZeros($_9cdf67da7b34)
    {
        return sprintf('%02d', $_9cdf67da7b34);
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return array('year' => $this->getYear(), 'month' => $this->getMonth(), 'day' => $this->getDay(), 'hour' => $this->getHour(), 'minute' => $this->getMinute(), 'second' => $this->getSecond(), 'day name' => $this->getDayName(), 'month name' => $this->getMonthName(), 'timestamp' => $this->getTimestamp(), 'julian day' => $this->getJulianDay());
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->_66478dec0b8e;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->_0f91aa8e53a2;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->_dd8a6e754b38;
    }

    /**
     * @return mixed
     */
    public function getHour()
    {
        return $this->_413cb80de3a1;
    }

    /**
     * @return mixed
     */
    public function getMinute()
    {
        return $this->_96fc75e23061;
    }

    /**
     * @return mixed
     */
    public function getSecond()
    {
        return $this->_58b2d5bb2a06;
    }

    /**
     * @param bool $short
     * @return mixed
     */
    public function getDayName($_7639d346d4a8 = false)
    {
        if ($_7639d346d4a8) return $this->_ca000113b866;
        return $this->_cbfd7c9a4508;
    }

    /**
     * @param $short bool
     * @return mixed
     */
    public function getMonthName($_7639d346d4a8 = false)
    {
        if ($_7639d346d4a8) return $this->_3011e40ff38d;
        return $this->_54e8e97a680e;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->_4d5f86230f9e;
    }

    /**
     * @return mixed
     */
    public function getJulianDay()
    {
        return $this->_89dc56d343ba;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "{$this->getYear()}-{$this->getMonth()}-{$this->getDay()} {$this->getHour()}:{$this->getMinute()}:{$this->getSecond()}";
    }
}