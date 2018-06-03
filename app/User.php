<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

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

    /**

     * @param string|array $roles

     */

    public function authorizeRoles($roles)

    {

        if (is_array($roles)) {

            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');

        }

        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');

    }

    /**

     * Check multiple roles

     * @param array $roles

     */

    public function hasAnyRole($roles)

    {

        return null !== $this->whereIn('role_id', $roles)->first();

    }

    /**

     * Check one role

     * @param string $role

     */

    public function hasRole($role)

    {

        return null !== $this->where('role_id', $role)->first();

    }

    public function AuthUserMat()
    {
        $email=Auth::user()->email;
        $ens=enseignant::where('email',$email)->get();
        $mat=$ens[0]->matProf;
        return $mat;
    }
}
