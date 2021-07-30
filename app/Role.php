<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;

    protected $table = "tb_roles";
    protected $primaryKey = "id";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'slug', 'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
