<?php

namespace Data;

class Category
{
    private string $name;
    private bool $expensive;

    // Getterr
    public function getName(): string
    {
        return $this->name;
    }

    // Setter
    public function setName(string $name): void
    {
        if (trim($name) != "") {
            $this->name = $name;
        }
    }


    // Getterr
    public function isExpensive(): bool
    {
        return $this->expensive;
    }

    // Setter
    public function setExpensive(bool $expensive): bool
    {
        return $this->expensive = $expensive;
    }
}
