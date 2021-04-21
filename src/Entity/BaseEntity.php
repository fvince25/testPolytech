<?php


namespace App\Entity;


class BaseEntity {

    public function hydrate(array $data)
    {
        if (!count($data) or empty($data))
            $this;

        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method))
                $this->$method($value);
        }
        return $this;
    }
}