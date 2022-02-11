<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    use HasFactory;

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function owner()
    {
        return $this->belongsTo(GrievanceOwner::class, 'grievance_owner_id');
    }
}
