<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{
    use HasFactory;

    protected $table = 'websites';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function blog()
    {
        return $this->hasMany(Blogs::class);
    }

    public function subscribers()
    {
        return $this->hasMany(SubscriberWebsite::class, 'website_id', 'id');
    }
}
