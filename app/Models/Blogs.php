<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
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

    public function website()
    {
        return $this->belongsTo(Websites::class, 'website_id', 'id');
    }
}
