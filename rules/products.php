<?php

return [
    'author_id' => ['required', 'integer', 'max:9223372036854775807', 'exists:users,id'],
    'name' => ['required', 'string', 'max:255'],
    'repository_url' => ['required', 'string', 'max:255']
];