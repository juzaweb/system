<?php

namespace Tadcms\System\Repositories;

use Tadcms\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return \App\User::class;
    }
    
    public function update(array $attributes, $id)
    {
        if (empty($attributes['password'])) {
            unset($attributes['password']);
        }
        
        return parent::update($attributes, $id);
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