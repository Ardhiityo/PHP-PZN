<?php

class Student
{
    public string $id;
    public string $name;
    public int $value;
    public string $sample;

    public function setSample(string $sample): void
    {
        $this->sample = $sample;
    }

    // Untuk pengecualian clone pada properties $value
    public function __clone()
    {
        unset($this->value);
    }

    // toString
    public function __toString(): string
    {
        return "Student id:$this->id, name:$this->name, value:$this->value";
    }

    // Invoke Function
    public function __invoke(...$arguments): void
    {
        echo "Invoke student with arguments: " . implode(', ', $arguments);
    }

    // Debug Info
    public function __debugInfo(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "value" => $this->value,
            "author" => "Ardhi",
            "version" => "1.0.0",
            "sample" => $this->sample
        ];
    }
}
