<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $publiched_at
 * @property integer $user_id
 *
 * @property User $user
 */
class NewsBlog extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'news_blog';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['publiched_at'], 'dateValidator'],
            [['publiched_at'], 'filter', 'filter' => function ($value) {
                    return substr($value, -4) . '-' . substr($value, 4, 2) . '-' . substr($value, 0, 2);
                }
            ],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
        ];
    }

    public function dateParse() {
        $timestapm = strtotime($this->publiched_at);
        if ($timestapm == FALSE) {
            return $this->publiched_at;
        } else {
            return date('d.m.Y', $timestapm);
        }
    }

    public function dateValidator() {
        $date = $this->publiched_at;
        $time = substr($date, -4) . '-' . substr($date, 4, 2) . '-' . substr($date, 0, 2);
        $timestapm = strtotime($time);
        if (preg_match('/[\pL]/u', $date) != 0 || $timestapm == FALSE) {
            $this->addError('publiched_at', Yii::t('app', 'Ведите дату полностью. (' . $date . ')'));
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => '№ п.п.',
            'title' => 'Заголовок',
            'content' => 'Текст новости',
            'publiched_at' => 'Дата публикации',
            'user_id' => 'ID Пользователя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserID() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
