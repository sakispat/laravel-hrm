<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'area_id',
        'extra_task',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'area_id' => 'integer',
        'extra_task' => 'boolean',
    ];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
