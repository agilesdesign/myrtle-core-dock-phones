<?php

namespace Myrtle\Core\Phones\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneType extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function phones()
    {
        return $this->hasMany(Phone::class, 'type_id');
    }
}
