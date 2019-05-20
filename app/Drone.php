<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

final class Drone extends Model {
    protected $fillable = ['image', 'name', 'address', 'battery', 'max_speed', 'average_speed', 'status', 'fly'];
}
