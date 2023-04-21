<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupTask extends Model
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
        'task_id',
        'shift_id',
        'color',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'task_id' => 'integer',
        'shift_id' => 'integer',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
