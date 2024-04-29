<?php

namespace App;

class DataService
{
    public function getItems(): array
    {
        return [
            new User(1, 'John', 'Admin'),
            new User(2, 'Jane', 'User'),
            new User(3, 'Alice', 'User'),
            new User(4, 'John', 'Admin')
        ];
    }
}
