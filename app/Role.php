<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;
    use HasRoles;

    protected $table = "tb_roles";
    protected $primaryKey = "id";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
