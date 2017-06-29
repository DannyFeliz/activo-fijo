<?php

namespace App;

use App\Department;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function department() {
        return $this->hasOne(Department::class, "id", "department_id");
    }
}
