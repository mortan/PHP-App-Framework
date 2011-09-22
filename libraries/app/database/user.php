<?php
 
class User
{
    public function addUser($name)
    {
        return 'Added user ' . $name . ' to the database';
    }

    public function deleteUser($name)
    {
		return 'Deleted user ' . $name . ' from the database';
    }
}
