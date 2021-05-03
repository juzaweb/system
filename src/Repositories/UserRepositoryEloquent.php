<?php

namespace Tadcms\System\Repositories;

use Tadcms\Repository\Eloquent\BaseRepository;
use Tadcms\System\Models\User;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace Tadcms\System\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like',
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function update(array $attributes, $id)
    {
        if (empty($attributes['password'])) {
            unset($attributes['password']);
        }

        return parent::update($attributes, $id);
    }
}
