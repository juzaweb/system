<?php

namespace Lararepo\Repositories;

class UserRepository extends EloquentRepository
{
    public function model()
    {
        return \App\User::class;
    }
    
    public function update($id, array $attributes)
    {
        if (empty(@$attributes['password'])) {
            unset($attributes['password']);
        }
        
        return parent::update($id, $attributes);
    }
    
    public function setAdmin($user, $isAdmin = 0)
    {
        return $this->find($user)
            ->setAttribute('is_admin', $isAdmin)
            ->save();
    }
    
    public function setAvatar($user, $avatar)
    {
        return $this->find($user)
            ->setAttribute('avatar', $avatar)
            ->save();
    }
}