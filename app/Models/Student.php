<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static latest()
 * @method static orderBy(string $string)
 */
class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $table = 'students';

    public function getGenderAttribute($gender): string
    {
        switch ($gender){
            case '0' :
                $gender = 'خانم';
                break;
            case '1' :
                $gender = 'آقای';
                break;
            default:
                $gender = '';
        }
        return $gender;
    }

    public function courses(): HasMany
    {
        return $this->hasMany(StudentCourse::class);
    }

}
