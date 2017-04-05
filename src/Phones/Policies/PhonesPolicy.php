<?php

namespace Myrtle\Core\Phones\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhonesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

	public function admin(User $user)
	{
		return $user->allPermissions->contains(function ($ability, $key)
		{
			return $ability->name === 'phones.admin';
		});
	}
}
