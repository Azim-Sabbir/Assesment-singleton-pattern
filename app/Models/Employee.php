<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Employee
{
    public static function all()
    {
        $path = 'json/employee.json';
        $employees = File::get($path);
        return json_decode($employees, true);
    }
}
