<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class SubjectCourse extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_subject_course";
    protected $primaryKey = ['subject_id', 'course_id'];
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id', 'course_id'
    ];

    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
}
