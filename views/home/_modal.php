<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Modal Popup action ##################### -->
<div class="modal fade second-modal" id="modal-action" data-backdrop="static" style="padding: 0px; margin: 0px;">
    <div class="modal-dialog">
        <div class="modal-content" style="border: 0px;padding: 0px;">
            <div class="modal-body" style="background: #fff;padding: 50px;">
                <div id='modal-content-action' class="modal-content-display" style="padding-bottom: 20px; ">
                </div>
                <div id="modal-content-button" class="text-center">
                    <?= Html::a('<i class="icofont icofont-close"></i> ปิดหน้าต่างนี้ ', ['home/index'], ['class'=>'btn btn-default btn-sm','style'=> 'margin:5px;border: 0px;']) ?>
                </div>
            </div>
        </div>
    </div>
</div>