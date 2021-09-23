<?php

namespace App\Builder;

class SearchByName implements Searchable
{
    public function search($data, $value)
    {
        return array_filter($data, function ($collection) use ($value) {
            return $collection['name']== $value;
        });
    }
}
