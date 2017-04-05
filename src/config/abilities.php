<?php

return [
	\Myrtle\Core\Docks\PhonesDock::class => [
        'access-admin' => 'Access Administrative Routes',
        'admin' => 'Administrator',
        PhoneTypesTableSeeder::class => ['admin',
            'create' => 'Create',
            'delete' => 'Delete',
            'edit' => 'Edit'
        ]
	],
];