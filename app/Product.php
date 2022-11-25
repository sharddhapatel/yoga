<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Product extends Authenticatable
{
    use Notifiable;

    public $table = 'product';

    protected $guard = 'table';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cid', 'item_img', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function productdetail()
    {
        return $this->hasMany('App\ProductDetail', 'pid', 'id')->orderBy('created_at', 'desc');
    }
}
