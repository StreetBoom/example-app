<?php

namespace App\Providers;

use App\Models\AdminUser;
use App\Models\Post;
use App\Models\User;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        AdminUser::class => 'App\Http\Admin\AdminUsers',
        User::class => 'App\Http\Admin\Users',
        Post::class=>'App\Http\Admin\Posts',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
