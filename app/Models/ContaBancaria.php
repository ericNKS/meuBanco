<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    use HasFactory;
    protected $table = 'contas_bancaria';

    protected $fillable = [
        'user_id',
        'agencia',
        'conta',
        'saldo',
    ];

    public function user()
    {
        return $this->hasOne(App\Models\User::class);
    }
}
