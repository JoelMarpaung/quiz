<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MatematikaQuestion extends Model
{
    use SoftDeletes;

    protected $fillable = ['matematika_id','question','point','option_a','option_b','option_c','option_d','option_e','correct'];

    public static function boot()
    {
        parent::boot();

        MatematikaQuestion::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMatematikaIdAttribute($input)
    {
        $this->attributes['matematika_id'] = $input ? $input : null;
    }

    public function matematika()
    {
        return $this->belongsTo(Matematika::class, 'matematika_id')->withTrashed();
    }

}
