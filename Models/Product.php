<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('code', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('barcode', 'like', '%' . $search . '%')
                    ->orWhere('series', 'like', '%' . $search . '%');
                }
            );
        });
        
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->where('category', $category);
        });
    }


    public function melawatistock() {
        return $this->hasOne(Melawatistock::class);
    }

    public function semenyihstock() {
        return $this->hasOne((Semenyihstock::class));
    }
}
