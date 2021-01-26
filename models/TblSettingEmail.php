<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_setting_email".
 *
 * @property int $ID
 * @property string $_email
 * @property string $_reply
 * @property string $_datetime_edit
 */
class TblSettingEmail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_setting_email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_email', '_reply', '_datetime_edit'], 'required'],
            [['_email', '_reply'], 'string'],
            [['_datetime_edit'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            '_email' => 'Email',
            '_reply' => 'Reply',
            '_datetime_edit' => 'Datetime Edit',
        ];
    }
}
