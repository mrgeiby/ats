<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Engineer extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'engineers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rate', 'user_id'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
