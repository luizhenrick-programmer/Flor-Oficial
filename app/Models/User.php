<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    public function user()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }

    protected $fillable = [
        'name',
        'cpf',
        'telefone',
        'username',
        'role',
        'endereco',
        'email',
        'status',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function endereco() {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }

}
