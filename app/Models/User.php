<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'image',
        'email_verified_at',
        'is_admin',
        'provider',
        'provider_id',
        'profile_completed',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'profile_completed' => 'boolean',
        ];
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function user()
    {
        return $this->hasMany(Post::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function faculty()
    {
        return $this->hasOne(Faculty::class);
    }

    public function hod()
    {
        return $this->hasOne(HoD::class);
    }

    public function principle()
    {
        return $this->hasOne(Principal::class);
    }

    public function registeredEvents()
    {
        return $this->hasMany(RegisteredEvents::class);
    }

    public function registeredPrograms()
    {
        return $this->hasManyThrough(
            Program::class,
            RegisteredEvents::class,
            'user_id',
            'id',
            'id',
            'program_id'
        );
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonials::class);
    }
}
