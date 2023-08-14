create table if not exists user
(
    `id`         int auto_increment primary key,
    `username`   varchar(32)                                      not null
    `created_at` timestamp              default CURRENT_TIMESTAMP not null,
    `updated_at` timestamp                                        null on update CURRENT_TIMESTAMP,
    `theme`      enum ('light', 'dark') default 'light'           not null,
    `access`     int                    default 0                 not null,
    constraint user_id_uindex unique (`id`),
    constraint user_username_uindex unique (`username`)
    ) ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4;

create table if not exists session
(
    `id`          int auto_increment primary key,
    `created_at`  timestamp default CURRENT_TIMESTAMP not null,
    `updated_at`  timestamp                           null on update CURRENT_TIMESTAMP,
    `user`        int                                 not null,
    `key`         blob                                not null,
    `ip_address`  varbinary(16)                       not null,
    `last_active` timestamp                           not null,
    constraint session_id_uindex unique (id),
    constraint session_user_id_fk foreign key (`user`) references `user` (`id`) on update cascade on delete cascade
    ) ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4;

create table if not exists article
(
    `id`         int auto_increment primary key,
    `created_at` timestamp default CURRENT_TIMESTAMP not null,
    `updated_at` timestamp                           null on update CURRENT_TIMESTAMP,
    `user`       int                                 not null,
    `title`      text                                not null,
    `content`    text                                not null,
    constraint article_id_uindex unique (`id`),
    constraint article_user_id_fk foreign key (`user`) references `user` (`id`) on update cascade on delete cascade,
    ) ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4;

create table if not exists comment
(
    `id`         int auto_increment primary key,
    `created_at` timestamp default CURRENT_TIMESTAMP not null,
    `updated_at` timestamp                           null on update CURRENT_TIMESTAMP,
    `user`       int                                 not null,
    `article`    int                                 not null,
    `content`    text                                null,
    `reply_to`   int                                 null,
    constraint comment_id_uindex unique (`id`),
    constraint comment_article_id_fk foreign key (`article`) references `article` (`id`) on update cascade on delete cascade,
    constraint comment_user_id_fk foreign key (`user`) references `user` (`id`) on update cascade on delete cascade,
    constraint comment_comment_id_fk foreign key (`reply_to`) references `comment` (`id`) on update cascade on delete cascade
    ) ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4;
