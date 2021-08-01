<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_departments";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name'
    ];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}