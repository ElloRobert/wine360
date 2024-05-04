<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use Notifiable, HasRoleAndPermission, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'city',
        'image',
        'company',
        'company_oib',
        'oib',
        'legal_entity_employee_permission',
        'appLanguage',
        'activation',
        'activation_date',
        'legal_entity_user_id',
        'is_active',
        'configuration_id'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'address' => 'string',
        'city' => 'string',
        'image' => 'string',
        'company' => 'string',
        'oib' => 'string',
        'company_oib' => 'string',
        'is_active' => 'bool',
        'legal_entity_user_id' => 'int',
        'legal_entity_employee_permission' => 'bool',
        'appLanguage' => 'string',
        'activation' => 'int',
        'activation_date' => 'datetime',
        'configuration_id' => 'int',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function legalEntityUser()
    {
        return $this->belongsTo(User::class, 'legal_entity_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function configuration()
    {
        return $this->hasOne(Configuration::class, 'user_id');
    }

    public function companyConfiguration()
    {
        return $this->belongsTo(Configuration::class,'configuration_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legalEntityEmployees()
    {
        return $this->hasMany(User::class, 'legal_entity_user_id');
    }




   
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'creator_id');
    }



    /**
     * Checks if the user has at least one of the specified roles.
     *
     * The ultraware/roles package has methods for checking one or all roles, but not for checking
     * any of the specified roles.
     * The original package (romanbican/roles) from which ultraware/roles was forked does not have
     * this problem because its is() method handles this case, however it is not maintained anymore.
     *
     * Example usage:
     *  $user->hasAnyRole('admin')
     *  $user->hasAnyRole(['admin'])
     *  $user->hasAnyRole('admin', 'legal')
     *  $user->asAnyRole(['admin', 'legal'])
     *
     * @param $role_slug
     * @return bool
     */
    public function hasAnyRole($role_slug)
    {
        $slugs = is_array($role_slug) ? $role_slug : func_get_args();

        return $this->getRoles()->pluck('slug')->intersect($slugs)->isNotEmpty();
    }
}
