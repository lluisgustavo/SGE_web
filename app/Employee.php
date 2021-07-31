<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_employees";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'person_id'
    ];

    public function person()
    {
        return $this->hasOne(Person::class);
    }
}
