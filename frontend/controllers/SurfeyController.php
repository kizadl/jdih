// controllers/SurveyController.php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Survey;

class SurveyController extends Controller
{
    public function actionIndex()
    {
        $model = new Survey();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Simpan data survei ke database
            $model->save();

            // Tampilkan pesan sukses atau redirect ke halaman lain
            Yii::$app->session->setFlash('success', 'Terima kasih telah mengisi survei.');
            return $this->refresh(); // refresh halaman untuk menghindari pengiriman ulang form
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
