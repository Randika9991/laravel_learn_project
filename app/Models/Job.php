<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {
    use HasFactory;
    protected $table = 'job_listings';
//
//        protected $fillable = ['title', 'salary','employer_id'];

    protected $guarded = [];

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employer::class); // Make sure the foreign key 'employer_id' is correct
    }
//    protected $fillable = ['title', 'salary'];
//    public function tags(){
//        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
//    }
}







