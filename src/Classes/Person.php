<?php

namespace App\Classes;

class Person
{
    public function __construct($firstname, $surname)
    {
        $this->firstname = $this->parse_name($firstname);
        $this->surname = $this->parse_name($surname);
    }

    public function get_full_name(): string
    {
        return $this->firstname . ' ' . $this->surname;
    }

    private function parse_name($name)
    {
        if (strlen($name) > 10) {
            throw new \InvalidArgumentException('Length of name is greater than the allowed 10 characters');
        } else {
            return $name;
        }
    }
}
