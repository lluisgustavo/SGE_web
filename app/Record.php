<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Record extends Model
{
    use Notifiable;

    protected $table = "tb_records";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'attendance', 'grades', 'status', 'student_id'
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'id');
    }
}
