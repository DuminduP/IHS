<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Grievance extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            if(Auth::user() && Auth::user()->role_id != 1)  {
                $builder->where('institution_id', Auth::user()->institution_id);
            }
        });
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function sub_institution()
    {
        return $this->belongsTo(SubInstitution::class);
    }

    public function category()
    {
        return $this->belongsTo(GrievanceType::class, 'grievance_type_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(GrievanceFile::class);
    }

    public function owner()
    {
        return $this->belongsTo(GrievanceOwner::class, 'grievance_owner_id');
    }

    public function getUuid()
    {
        $unique = strtoupper(str::random(6));

        $check = Model::where('uuid', $unique)->first();

        if ($check) {
            return $this->getUuid();
        }

        return $unique;
    }
}
