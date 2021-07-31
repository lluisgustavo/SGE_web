<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Fee extends Model
{
    use Notifiable;

    protected $table = "tb_fees";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'value', 'due_date', 'status', 'student_id'
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'id');
    }
}
