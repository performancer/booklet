<?php

declare(strict_types=1);

namespace MediaSite\Component;

use Booklet\Contract\Component;
use Booklet\View;
use MediaSite\Model\ProfileModel;

final class ProfileComponent implements Component
{
    public function __construct(
        private readonly ProfileModel $profile
    ) {
    }

    public function render(): string
    {
        return View::render(
            directory: TEMPLATE_DIRECTORY,
            template: 'Profile.phtml',
            variables: [
                'name' => $this->profile->name(),
                'timestamp' => $this->profile->timestamp(),
                'desc' => $this->profile->desc(),
            ],
        );
    }
}
