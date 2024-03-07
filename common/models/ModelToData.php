<?php


namespace common\models;

use common\models\User;
use backend\modules\rbac\models\AuthItem;
use backend\modules\rbac\models\AuthRule;
use yii\helpers\ArrayHelper;

class ModelToData
{



    public static function getAuthItems(): array
    {
        return ArrayHelper::map(
            AuthItem::find()->all(),
            'name',
            'name',
        );
    }

    public static function getUsers(): array
    {
        return ArrayHelper::map(
            User::find()->all(),
            'id',
            'username',
        );
    }



}