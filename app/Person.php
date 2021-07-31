<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Person extends Model
{
    use Notifiable;

    protected $table = "tb_people";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'cpf', 'birthday', 'phone', 'address_id', 'user_id'
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
