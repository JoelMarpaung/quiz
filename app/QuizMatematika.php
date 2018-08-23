<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class QuizMatematika extends Model
{
    use SoftDeletes;
    protected $table = 'quiz_matematikas';
    protected $fillable = ['user_id','matematika_id','total_correct','score','result'];

    public static function boot()
    {
        parent::boot();

        QuizMatematika::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    public function setMatematikaIdAttribute($input)
    {
        $this->attributes['matematika_id'] = $input ? $input : null;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function matematika()
    {
        return $this->belongsTo(Matematika::class, 'matematika_id')->withTrashed();
    }
}
