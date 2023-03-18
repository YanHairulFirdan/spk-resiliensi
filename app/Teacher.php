<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;
    protected $guard = 'teacher';
    protected $fillable = [
        'name',
        'username',
        'email',
        'nip',
        'class',
        'subject',
        'password'
    ];

    protected function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the student for the teacher.
     * @return\Illuminate\Database\Eloquent\Collection<\App\Student>
     */
    public function getStudents($relation = ''): Collection
    {
        $students = User::query()
            ->with($relation)
            ->where('class', $this->class)
            ->where(function ($query) {
                $query->whereNull('role');
                $query->orWhere('role', '');
                
            })
            ->get();

        return $students;
    }
}
