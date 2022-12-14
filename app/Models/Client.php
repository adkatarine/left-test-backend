<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'date_birth', 'cpf', 'cnpj'];

    public function addresses() {
        return $this->hasMany(Address::class);
    }

    public function client_orders() {
        return $this->hasMany(ClientOrder::class);
    }
}
