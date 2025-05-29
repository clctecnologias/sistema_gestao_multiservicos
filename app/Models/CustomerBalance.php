<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CustomerBalance extends Model
{
    use HasUuids;
    protected $fillable = ["current_balance","customer_uuid"];
}
