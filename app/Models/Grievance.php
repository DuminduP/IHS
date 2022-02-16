<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function getUuid()   {
        $unique = strtoupper(str::random(6));

        $check = Model::where('uuid', $unique)->first();

        if ($check) {
            return $this->getUuid();
        }

        return $unique;
    }
}
