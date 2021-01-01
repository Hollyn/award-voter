<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['candidate_category_id'];
    // protected $with = ['candidate', 'category'];
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
