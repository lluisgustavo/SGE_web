<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_students";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'course_id', 'person_id'
    ];

    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function person()
    {
        return $this->hasOne(Person::class);
    }
}
