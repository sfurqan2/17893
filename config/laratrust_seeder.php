<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'department_head' => [
            'users' => 'c,r,u,d',
            'expenses' => 'm',
        ],
        'buyer' => [
            'profile' => 'r,u',
        ],
        'budget_head' => [
            'budgets' => 'c,r,u,d',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'm' => 'manage',
    ]
];
