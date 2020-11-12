<?php

namespace TheRealMVP;

class DisplayFilter
{
    /**
     * Iterate through each team object to display values and inject html
     *
     * @param string $type
     * @param mixed  $data
     *
     * @return string
     */
    public static function displayFilter(string $type, array $data) : string
    {
        $filterString = '';
        $selected = '';
        foreach($data as $item){
            if ($_SESSION[$type] == $item->getId()) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $filterString .= '<option value="'
            . $item->getId()
            . '" '
            . $selected
            . '>'
            . $item->getName()
            . '</option>';
        }
        return $filterString;
    }
}