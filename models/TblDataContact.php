<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_data_contact".
 *
 * @property int $ID
 * @property string $_website
 * @property string $_fname
 * @property string $_lname
 * @property string $_email
 * @property string $_tel
 * @property string|null $_line_id
 * @property string $_detail
 * @property string|null $_datetime_add
 * @property string|null $utm_source
 * @property string|null $utm_medium
 * @property string|null $utm_campaign
 */
class TblDataContact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_data_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_website', '_fname', '_lname', '_email', '_tel', '_detail'], 'required'],
            [['_website', '_fname', '_lname', '_email', '_tel', '_detail', 'utm_source', 'utm_medium', 'utm_campaign'], 'string'],
            [['_datetime_add'], 'safe'],
            [['_line_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            '_website' => 'Website',
            '_fname' => 'Fname',
            '_lname' => 'Lname',
            '_email' => 'Email',
            '_tel' => 'Tel',
            '_line_id' => 'Line ID',
            '_detail' => 'Detail',
            '_datetime_add' => 'Datetime Add',
            'utm_source' => 'Utm Source',
            'utm_medium' => 'Utm Medium',
            'utm_campaign' => 'Utm Campaign',
        ];
    }
}
