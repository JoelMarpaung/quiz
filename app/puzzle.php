<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class puzzle
 *
 * @package App
 * @property string $question
 * @property string $option
 * @property tinyInteger $correct
*/
class puzzle extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['option', 'Picture', 'question_id'];
    
    public static function boot()
    {
        parent::boot();

        puzzle::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setpuzzleIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }
    
    public function question()
    {
        return $this->belongsTo(puzzle::class, 'question_id')->withTrashed();
    }
    
}
