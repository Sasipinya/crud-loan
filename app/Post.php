<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loan';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['loanAmount', 'loanTerm', 'interestRate','startdate_month','startdate_year', 'created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
