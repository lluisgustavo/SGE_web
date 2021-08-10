<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Subject extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_subjects";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'hourly_load', 'syllabus', 'teacher_id'
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
