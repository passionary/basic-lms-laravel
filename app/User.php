<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','college_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function canViaRole($permission)
    {
        $permissions = $this->getPermissionsViaRoles()->pluck('name')->toArray();
        error_log(json_encode($permissions));
        error_log($permission . ' permission');
        error_log(in_array($permission, $permissions) . ' can');

        if(in_array($permission, $permissions)) {
            return true;
        }

        return false;
    }

    public function isSuperuser()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'superuser') {
                return true;
            }
        }

        return false;
    }

    public function isInstructor()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'instructor') {
                return true;
            }
        }

        return false;
    }

    public function isStudent()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'student') {
                return true;
            }
        }

        return false;
    }

    public function isStandardUser()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'standard-user') {
                return true;
            }
        }

        return false;
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'user_courses');
    }

    public function quizzes()
    {
        return $this->belongsToMany('App\UsersQuiz', 'user_quiz');
    }

}