<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Teacher extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_teachers";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'department_id', 'person_id'
    ];

    public function department()
    {
        return $this->hasOne(Department::class);
    }

    public function person()
    {
        return $this->hasOne(Person::class);
    }
}
