<?php

namespace App;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\UserCreatedNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * This method is necessary when create a new user.
     */
    public function setPassword()
    {
        $password = \Str::random(10);
        $this->notify(new UserCreatedNotification($this, $password));
        $this->password = \Hash::make($password);
    }

    /**
     * This method is necessary when create a new user.
     *
     * @param $newPassword
     */
    public function changePassword($newPassword)
    {
        $this->password = \Hash::make($newPassword);
        $this->updated_at = now();
        $this->save();
    }

    /**
     * This method is necessary for assign a role to user.
     *
     * @param $role
     */
    public function setRole($role)
    {
        $role = Role::findByName($role);
        $this->assignRole($role);
    }
}
