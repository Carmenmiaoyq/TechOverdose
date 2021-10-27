<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function topics()
    {
        return $this->hasMany(Topic::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }


    public function scopeGetAll($query)
    {
        // this query is more efficient than using with('roles')
        // orderByRaw is better if I decide to add more roles...
        $query->select('users.id', 'users.email_verified_at','users.name',
            'users.email', 'users.banned_until', 'profile_photo_path', 'roles.name as role_name')
              ->leftjoin('model_has_roles', 'model_has_roles.model_id', 'users.id')
              ->leftjoin('roles', 'roles.id', 'model_has_roles.role_id')
              ->where('users.id', '!=', auth()->id() )
              ->orderByRaw("FIELD(role_name, 'super-admin') desc, (users.name) asc");
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['q'] ?? false, function ($query, $q) {

            $query->select('users.id', 'users.email_verified_at','users.name',
                'users.email', 'users.banned_until', 'profile_photo_path', 'roles.name as role_name')
                  ->leftjoin('model_has_roles', 'model_has_roles.model_id', 'users.id')
                  ->leftjoin('roles', 'roles.id', 'model_has_roles.role_id')
                  ->where('users.id', '!=', auth()->id() )
                  ->where(function($query) use ($q) {
                    return $query
                      ->where('users.name', 'like', '%' . $q . '%')
                      ->orWhere('users.email', 'like', '%' . $q . '%');
                  })
                  ->orderByRaw("FIELD(role_name, 'super-admin') desc, (users.name) asc");
        });
    }

}
