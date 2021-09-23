<?php


namespace App\Builder;


class SearchById implements Searchable
{

    public function search($data, $value)
    {
        return array_filter($data, function ($collection) use ($value) {
            return $collection['id']== $value;
        });
    }
}
