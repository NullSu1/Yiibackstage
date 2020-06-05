<?php

namespace izyue\admin\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $user
 * @property string $article_title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Article extends \common\models\base\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'article_title'], 'required'],
            [['content','updated_at'], 'string'],
            [['created_at'], 'safe'],
            [['user', 'article_title','author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'article_title' => 'Article Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author' => 'Author',

        ];
    }
}
