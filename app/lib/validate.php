<?php

namespace MVC\Lib;

trait Validate
{
    private $_regexPatterns = [
        "int" => "/^\d+$/",
        "float" => "/^\d+\.\d+$/",
        "alpha" => "/^[a-zA-Z\p{Arabic}]+$/u",
        "alphanum" => "/^[a-zA-Z0-9\p{Arabic}]+$/u",
    ];

    public function int($value)
    {
        return (bool) preg_match($this->_regexPatterns["int"], $value);
    }

    public function float($value)
    {
        return (bool) preg_match($this->_regexPatterns["float"], $value);
    }

    public function alpha($value)
    {
        return (bool) preg_match($this->_regexPatterns["alpha"], $value);
    }

    public function alphanum($value)
    {
        return (bool) preg_match($this->_regexPatterns["alphanum"], $value);
    }


    public function req($value)
    {
        return !empty($value);
    }


    public function lt($value, int $match)
    {
        if (is_numeric($value)) {
            return $value < $match;
        } elseif (is_string($value)) {
            return mb_strlen($value) < $match;
        }
    }

    public function gt($value, int $match)
    {
        if (is_numeric($value)) {
            return $value > $match;
        } elseif (is_string($value)) {
            return mb_strlen($value) > $match;
        }
    }

    public function min($value, int $match)
    {
        if (is_numeric($value)) {
            return $value >= $match;
        } elseif (is_string($value)) {
            return mb_strlen($value) >= $match;
        }
    }

    public function max($value, int $match)
    {
        if (is_numeric($value)) {
            return $value <= $match;
        } elseif (is_string($value)) {
            return mb_strlen($value) <= $match;
        }
    }

    public function isDate($date)
    {
        $pattern = "/^\d{4}-\d{2}-\d{2}$/";
        return (bool) preg_match($pattern, $date);
    }

    public function email($value)
    {
        $pattern = "/^[\w+\.]+@\w+\.\w+$/i";
        return (bool) preg_match($pattern, $value);
    }

    public function matches($value, $value2) {
        if (isset($_POST)) {
            return $value === $_POST[$value2];
        } elseif(isset($_GET)) {
            return $value === $_GET[$value2];
        }
    }


    public function validateInputs($fields, $input)
    {
        $errors = [];
        $pattern = "/^(\w+)\((\w+)\)$/";
        foreach ($fields as $field => $cond) {
            $conds = explode("|", $cond);
            foreach ($conds as $condition) {
                if(array_key_exists($field, $errors)) {
                    continue;
                }
                if (preg_match_all($pattern, $condition, $match)) {
                    $funcName = $match[1][0];
                    $funcValue = $match[2][0];
                    if (!$this->$funcName($input[$field], $funcValue)) {
                        $errors[$field] = $funcName;
                    }
                } else {
                    if (!$this->$condition($input[$field])) {
                        $errors[$field] = $condition;
                    };
                }
            }
        }
        return $errors;
    }
}
