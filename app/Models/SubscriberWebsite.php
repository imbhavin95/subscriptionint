<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberWebsite extends Model
{
    use HasFactory;

    protected $table = 'subscriber_website';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscriber_id',
        'website_id'
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

    public function subscriber()
    {
        return $this->belongsTo(Subscribers::class, 'subscriber_id', 'id');
    }
}
