<?php

return [
    'name' => ['required', 'string', 'max:255'],
    'github_account' => ['nullable', 'string', 'max:255'],
    'email' => ['required', 'string', 'max:255'],
    'email_verified_at' => ['nullable', 'date'],
    'password' => ['required', 'string', 'max:255'],
    'remember_token' => ['nullable', 'string', 'max:100']
];