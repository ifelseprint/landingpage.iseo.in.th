<?php

namespace app\models;

use Yii;

class FormContact extends \app\models\TblDataContact
{
    public function beforeSave($insert) {

        if ($this->isNewRecord) {
            $this->_datetime_add = new \yii\db\Expression('NOW()');
        }
        return parent::beforeSave($insert);
    }
}
