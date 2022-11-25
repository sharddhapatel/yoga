<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Category extends Authenticatable
{
    use Notifiable;

    public $table = 'category';

    protected $guard = 'table';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function product()
    {
        return $this->hasMany('App\Product', 'cid', 'id')->orderBy('created_at', 'desc');
    }
}
