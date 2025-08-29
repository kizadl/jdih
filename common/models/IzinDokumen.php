<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * IzinDokumen model
 *
 * @property integer $id
 * @property string $client_id
 * @property string $dokumen_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class IzinDokumen extends ActiveRecord
{
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 2;
    const STATUS_EXPIRED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%izin_dokumen}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'dokumen_id'], 'required'],
            [['status'], 'integer'],
            [['client_id', 'dokumen_id'], 'string', 'max' => 255],
            [['status'], 'default', 'value' => self::STATUS_PENDING],
            [['status'], 'in', 'range' => [self::STATUS_REJECTED, self::STATUS_APPROVED, self::STATUS_PENDING, self::STATUS_EXPIRED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'dokumen_id' => 'Dokumen ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Dokumen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokumen()
    {
        return $this->hasOne(\backend\models\DokumenJdih::className(), ['id' => 'dokumen_id']);
    }

    /**
     * Get status label
     *
     * @return string
     */
    public function getStatusLabel()
    {
        $statuses = [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED => 'Disetujui',
            self::STATUS_REJECTED => 'Ditolak',
            self::STATUS_EXPIRED => 'Kadaluarsa',
        ];

        return isset($statuses[$this->status]) ? $statuses[$this->status] : 'Unknown';
    }

    public static function findByClientAndDokumen($clientId, $dokumenId)
    {
        return static::find()->where([
            'client_id' => $clientId,
            'dokumen_id' => $dokumenId
        ]);
    }

    public static function findActiveByClientAndDokumen($clientId, $dokumenId)
    {
        return static::find()->where([
            'client_id' => $clientId,
            'dokumen_id' => $dokumenId,
            'status' => 1
        ]);
    }

    public static function findActiveOrPendingByClientAndDokumen($clientId, $dokumenId)
    {
        return static::find()->where([
            'client_id' => $clientId,
            'dokumen_id' => $dokumenId,
            'status' => [1, 0]
        ]);
    }
}
