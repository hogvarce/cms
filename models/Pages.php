<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $h1
 * @property string $slug
 * @property string $description
 * @property string $content
 * @property integer $parent_id
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'h1', 'slug', 'description', 'content'], 'required'],
            [['description', 'content'], 'string'],
            [['id', 'parent_id'], 'integer'],
            [['title', 'h1', 'slug'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'h1' => 'H1',
            'slug' => 'Slug',
            'description' => 'Description',
            'content' => 'Content',
            'parent_id' => 'Parent ID',
        ];
    }

    public static function getItems()
    {
        $items = [];
        $models = parent::find()->all();
        foreach($models as $model) {
            $items[] = ['label' => $model->title, 'url' => $model->slug];
        }
    return $items;
    }
}
