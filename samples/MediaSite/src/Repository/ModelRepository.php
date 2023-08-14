<?php

declare(strict_types=1);

namespace MediaSite\Repository;

use MediaSite\Model\CommentModel;
use MediaSite\Model\CreatorModel;

final class ModelRepository
{
    public function getCommentsByArticle(string $articleId): array
    {
        //TODO: this is just sample data...

        return [
            new CommentModel(
                id: 0,
                timestamp: 20000,
                creator: new CreatorModel('Jane Smith'),
                content: 'A very good post',
            ),
            new CommentModel(
                id: 1,
                timestamp: 20000,
                creator: new CreatorModel('Matti Meikäläinen'),
                content: 'I would like to know more about this',
            ),
        ];
    }
}
