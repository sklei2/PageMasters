<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsToMany('App\Models\Role');
    }

    public function isRole($roleName) {
        foreach ($this->role()->get() as $role) {
            if ($role->name == $roleName) {
                return true;
            }
        }
        return false;
    }

    public function roleInfo() {
        if ($this->isRole('student')) {
            return $this->belongsToMany('App\Models\Student', 'student_user', 'student_id', 'user_id');
        } else if ($this->isRole('instructor')) {
            return $this->belongsToMany('App\Models\Instructor', 'instructor_user', 'instructor_id', 'user_id');
        } else {
            return $this->belongsToMany('App\Models\Admin', 'admin_user', 'admin_id', 'user_id');
        }
    }
}
