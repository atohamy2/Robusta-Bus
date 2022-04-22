<?php

/**
 *  Helper for Checkbox
 *
 * @param string $option1
 * @param string $option2
 * @return string checked
 */
function checked($option1, $option2)
{
    if (is_array($option2)) {
        if (in_array($option1, $option2)) {
            return "checked='checked'";
        }
    } else
    if ($option1 == $option2) {
        return "checked='checked'";
    }
}

/**
 * Helper for Dropdown
 *
 * @param string $option1
 * @param string || array $option2
 * @return string selected
 */
function selected($option1, $option2)
{
    if (is_array($option2)) {
        if (in_array($option1, $option2)) {
            return "selected='selected'";
        }
    } else
    if ($option1 == $option2) {
        return "selected='selected'";
    }
}

/**
 * Helper for Inputs
 *
 * @param string $key
 * @param object $object
 * @return string value
 */
function inputValidation($key, $object)
{
    return (old($key)) ?: $object->$key;
}
/**
 * Helper for Inputs
 *

 * @param object $object
 * @param object $local
 * @return string value
 */
function inputValidationTranslation($key, $object,$local)
{
    return (old($key)) ?old($key)[$local]: $object->getTranslation($key,$local);
}

/**
 * Helper for Generate Random Numbers
 *
 * @param int $length
 * @return int value
 */
function generateRandomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}
