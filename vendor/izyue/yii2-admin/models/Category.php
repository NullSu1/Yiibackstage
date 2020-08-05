<?php

namespace izyue\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $sortname
 * @property string $language
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends \common\models\base\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language'], 'required'],
            [['created_at', 'updated_at'], 'string', 'max' => 20],
            [['sortname'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sortname' => 'Sortname',
            'language' => 'Language',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
