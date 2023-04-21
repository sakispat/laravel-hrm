<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'area_id',
        'shift_id',
        'date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'area_id' => 'integer',
        'shift_id' => 'integer',
        'date' => 'date',
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function groupTasks()
    {
        return $this->belongsToMany(GroupTask::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
