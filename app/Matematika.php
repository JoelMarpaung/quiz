<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Matematika extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'time', 'description', 'topic_id', 'user_id'];

    public static function boot()
    {
        parent::boot();

        Question::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTopicIdAttribute($input)
    {
        $this->attributes['topic_id'] = $input ? $input : null;
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->withTrashed();
    }
}
