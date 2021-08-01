<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_courses";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'hourly_load'
    ];

    public function department()
    {
        return $this->hasOne(Department::class);
    }
}
