<?php

declare(strict_types=1);

namespace MediaSite\Repository;

use Booklet\Contract\User;
use Booklet\Enum\UserAccess;
use Booklet\User\DefaultUser;
use MediaSite\Model\ProfileModel;

final class UserRepository
{
    public function getUserById(int $userId): User
    {
        //TODO: this is just sample data...

        return new DefaultUser(
            id: 'john_smith',
            name: 'John Smith',
            access: UserAccess::STANDARD
        );
    }

    public function getProfileById(int $userId): ProfileModel
    {
        //TODO: this is just sample data...

        return new ProfileModel(
          name: 'John Smith',
          timestamp: 2000,
          desc: 'I am but a simple man.',
        );
    }
}
