<?php

declare(strict_types=1);

namespace MediaSite\Repository;

use MediaSite\Model\ArticleModel;
use MediaSite\Model\ArticlePreviewModel;
use MediaSite\Model\CreatorModel;

final class ArticleRepository
{
    /**
     * @return ArticlePreviewModel[]
     */
    public function getPreviews(int $offset, int $limit): array
    {
        //TODO: this is just sample data...

        return [
            new ArticlePreviewModel(
                timestamp: 0,
                creator: new CreatorModel(
                    name: 'John Smith'
                ),
                title: 'Something is on My Mind',
            ),
            new ArticlePreviewModel(
                timestamp: 0,
                creator: new CreatorModel(
                    name: 'Jane Smith'
                ),
                title: 'I Have to Speak About This',
            ),
            new ArticlePreviewModel(
                timestamp: 0,
                creator: new CreatorModel(
                    name: 'Jane Smith'
                ),
                title: 'The Drunk Guy at the Store',
            ),
            new ArticlePreviewModel(
                timestamp: 0,
                creator: new CreatorModel(
                    name: 'John Smith'
                ),
                title: 'The 9 Facts of Life',
            ),
        ];
    }

    /**
     * @return ArticlePreviewModel[]
     */
    public function getPreviewsByUser(int $userId): array
    {
        //TODO: this is just sample data...

        return [
            new ArticlePreviewModel(
                timestamp: 0,
                creator: new CreatorModel(
                    name: 'John Smith'
                ),
                title: 'Something is on My Mind',
            ),
            new ArticlePreviewModel(
                timestamp: 0,
                creator: new CreatorModel(
                    name: 'John Smith'
                ),
                title: 'The 9 Facts of Life',
            ),
        ];
    }

    public function getArticleById(string $articleId): ArticleModel
    {
        //TODO: this is just sample data...

        return new ArticleModel(
          timestamp: 0,
          creator: new CreatorModel(
              name: 'John Smith'
          ),
          title:  'Something is on My Mind',
          content: 'I have lot to say about this...',
        );
    }
}
