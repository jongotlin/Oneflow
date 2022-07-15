<?php

namespace JGI\Oneflow\Helper;

class DateTimeHelper
{
    /**
     * @param array $row
     * @param $key
     * @return \DateTime|null
     */
    public static function get(array $row, string $key): ?\DateTime
    {
        try {
            $result = new \DateTime($row[$key]);
        } catch (\Exception $e) {
            $result = null;
        }

        return $result;
    }
}
