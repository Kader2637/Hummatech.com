<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function termsconditions(): HasMany
    {
        return $this->hasMany(Termscondition::class);
    }

    public function procedures(): HasMany
    {
        return $this->hasMany(Procedure::class);
    }
}
