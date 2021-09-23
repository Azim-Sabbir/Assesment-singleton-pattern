<?php

namespace App\Builder;

class Query
{
    private $data;

    private static $instance = null;

    private function __construct($data)
    {
        $this->data = $data;
    }

    public static function make($data): ?Query
    {
        if (self::$instance == null) {
            self::$instance = new static($data);
        }
        return self::$instance;
    }

    public function pushSearch(Searchable $searchable, $value): Query
    {
        if (isset($value)) {
            $this->data = $searchable->search($this->data, $value);
        }
        return $this;
    }

    public function get()
    {
        return $this->data;
    }

    public function first()
    {
        return current($this->data);
    }
}
