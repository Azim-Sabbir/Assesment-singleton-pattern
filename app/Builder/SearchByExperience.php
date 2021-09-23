<?php


namespace App\Builder;


class SearchByExperience implements Searchable
{

    public function search($data, $value)
    {
        return array_filter($data, function ($collection) use ($value) {
            return $collection['experience']== $value;
        });
    }
}
