<?php

namespace App;

class User
{
    public int $id;
    public string $name;
    public string $role;

    public function __construct($id, $name, $role) {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role;
    }
}
