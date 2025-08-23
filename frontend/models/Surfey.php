// models/Survey.php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Survey extends ActiveRecord
{
    public static function tableName()
    {
        return 'survey';
    }

    public function rules()
    {
        return [
            [['respondent_name', 'question_1', 'question_2', 'question_3', 'question_4', 'question_5', 'question_6', 'question_7', 'question_8', 'question_9'], 'required'],
            [['respondent_name'], 'string', 'max' => 100],
            [['question_1', 'question_2', 'question_3', 'question_4', 'question_5', 'question_6', 'question_7', 'question_8', 'question_9'], 'integer'],
        ];
    }
}
