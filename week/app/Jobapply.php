<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobapply extends Model
{
    //
    protected $table = 'jobsapply';
    protected $fillable = [
        'email',
        'name',
        'Phone',
        'gender',
        'country_name',
        'state_name',
        'created_at',
        'updated_at',
        'city',
        'address',
        'cover_letter',
        'skills',
        'resume',
        'Id_Job',
        'Name_Job',

    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function Jobapply()
    {
        return $this->belongsToMany(Jobapply::class);
    }
    public function scopeSearchResults($query)
    {
        return $query->when(!empty(request()->input('location', 0)), function($query) {
            $query->whereHas('location', function($query) {
                $query->whereId(request()->input('location'));
            });
        })
            ->when(!empty(request()->input('category', 0)), function($query) {
                $query->whereHas('categories', function($query) {
                    $query->whereId(request()->input('category'));
                });
            })
            ->when(!empty(request()->input('search', '')), function($query) {
                $query->where(function($query) {
                    $search = request()->input('search');
                    $query->where('title', 'LIKE', "%$search%")
                        ->orWhere('short_description', 'LIKE', "%$search%")
                        ->orWhere('full_description', 'LIKE', "%$search%")
                        ->orWhere('job_nature', 'LIKE', "%$search%")
                        ->orWhere('requirements', 'LIKE', "%$search%")
                        ->orWhere('address', 'LIKE', "%$search%")
                        ->orWhereHas('company', function($query) use($search) {
                            $query->where('name', 'LIKE', "%$search%");
                        });
                });
            });
    }
}

