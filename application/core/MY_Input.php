<?php
/**
 * This <server-travelohealth> project created by :
 * Name         : syafiq
 * Date / Time  : 11 August 2017, 10:36 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

class MY_Input extends CI_Input
{
    /**
     * @param string $key
     * @param mixed|null $default_value
     * @param bool $xss_clean
     * @return mixed|array|null
     */
    public function postOrDefault($key = null, $default_value = null, $xss_clean = null)
    {
        $value = parent::post($key, $xss_clean);

        if (!isset($value))
        {
            $value = $default_value;
        }

        return $value;
    }


    /**
     * @param string $key
     * @param mixed|null $default_value
     * @param bool $xss_clean
     * @return mixed|array|null
     */
    public function getOrDefault($key = null, $default_value = null, $xss_clean = null)
    {
        $value = parent::get($key, $xss_clean);

        if (!isset($value))
        {
            $value = $default_value;
        }

        return $value;
    }
}

?>
