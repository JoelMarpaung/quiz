<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class QuizMatematikaAnswer extends Model
{
    use SoftDeletes;
    protected $table = 'quiz_matematika_answers';
    protected $fillable = ['user_id','matematika_id','quiz_id','question_id','correct','score','answer'];

    public static function boot()
    {
        parent::boot();

        QuizMatematikaAnswer::observe(new \App\Observers\UserActionsObserver);
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

    public function quiz()
    {
        return $this->belongsTo('App\QuizMatematika', 'quiz_id');
    }

    public function question()
    {
        return $this->belongsTo('App\MatematikaQuestion', 'question_id');
    }
}
