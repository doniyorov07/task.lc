<?php


namespace common\enums;

interface NotificationEnums
{
    public const NOTIFICATION = 1;
    public const NOT_NOTIFICATION = 0;

    public const LABELS = [
        self::NOTIFICATION => "Faol",
        self::NOT_NOTIFICATION => "No-Faol",
    ];

    public const COLOR = [
        self::NOTIFICATION => '<i class="badge badge-success">Faol</i>',
        self::NOT_NOTIFICATION => '<i class="badge badge-danger">Faol emas</i>',
    ];
}