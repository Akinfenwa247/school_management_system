<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Task
 *
 * @package App
 * @property string $name
 * @property text $description
 * @property string $task_date
*/
class Task extends Model
{

    protected $fillable = ['name', 'description', 'date'];
    

}
