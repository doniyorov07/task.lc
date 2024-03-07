<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "emplyee".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $image
 * @property string|null $birthday
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emplyee';
    }

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'image'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => ['png', 'jpg', 'JPG', 'webp'], 'maxSize' => 5*(1024*1024)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'image' => 'Image',
            'birthday' => 'Birthday',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function uploadImg($oldImage = null)
    {
        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
            $this->image->saveAs('@frontend/web/employee/' .'image'.time() . '.' . $this->image->extension);
            $this->image = 'image'.time().'.'.$this->image->extension;
        }else{
            $this->image = $oldImage;
        }
    }
}
