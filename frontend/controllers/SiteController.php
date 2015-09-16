<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Product;
use backend\models\Review;
use backend\models\Call;
use backend\models\Ip;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $products = Product::find()->where([
            'top' => Product::STATUS_TOP,
            'category_id' => 1,
        ])->all();

        // $call = new Call();

        // cart
        $cart = Yii::$app->cart;
        $products_cart = $cart->getPositions();
        $total = $cart->getCost();

        return $this->render('index',[
            'products' => $products, 
            // 'call' => $call,
            'products_cart' => $products_cart,
            'total' => $total,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    // site.ru/<slug>
    public function actionSlug($slug_ru)
    { 
        $model = Product::find()->where(['slug_ru' => $slug_ru])->one();
        if (!is_null($model)) {
            return $this->render('product', [
                  'model' => $model,
                  'isRatingDisabled' => false,
            ]);      
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
            // return $this->redirect(Url::toRoute(['posts/index']));
        }
    }

    // метод обробатывает рейтинги
    public function actionProductRating()
    {
        if (Yii::$app->request->isAjax 
            and $rating = Yii::$app->request->post('rating')
            and $id = Yii::$app->request->post('id')) {

            if ($product = Product::findOne($id)) {
                $ip = Yii::$app->request->userIP;
                $ipModel = Ip::find()->where([
                    'name' => $ip,
                    'product_id' => $id
                ])->one();
                if ($ipModel === null) {
                    $currentRating = $product->rating;
                    $currentRatingCount = $product->rating_count;
                    $resultRating = round((($currentRating + $rating) / 2), 1);
                    $product->rating = $resultRating;
                    $product->rating_count = $currentRatingCount + 1;
                    $product->save();
                    $model = new Ip();
                    $model->name = $ip;
                    $model->product_id = $id;
                    $model->save(); 
                    return true;
                } else {
                    return 'forbidden';
                    // $this->refresh();
                }
            } else {
                return false;
            }
            
            // return json_encode([$rating, $id]);

        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCallCreate()
    {
        $model = new Call();

        $products = Product::find()->where([
            'top' => Product::STATUS_TOP,
            'category_id' => 1,
        ])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'Спасибо! Мы перезвоним Вам в ближайшее время.');
            $model->sendEmail('Новый Заказать Звонок', 'call');
            return $this->goHome();
        } else {

            return $this->render('index', [
                'call' => $model, 
                'products' => $products,
            ]);
        }
    }

    public function actionAccessories()
    {
        $products = Product::find()->where([
            'top' => Product::STATUS_TOP,
            'category_id' => 2,
        ])->all();

        $call = new Call();



        return $this->render('accessories', compact('products', 'call'));
    }


    public function actionReview()
    {
        $reviews = Review::find()->where([
            'status' => Review::STATUS_DONE
        ])->all();

        $model = new Review(); 

        return $this->render('review', compact('reviews', 'model'));
    }

    public function actionReviewCreate()
    {
        $model = new Review();

        $products = Product::find()->where([
            'top' => Product::STATUS_TOP,
            'category_id' => 1,
        ])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->sendEmail('Новый Отзыв', 'review');
            Yii::$app->session->addFlash('success', 'Спасибо за Ваш отзыв! Отзыв проходит модерацию.');
            return $this->goHome();
        } else {
            
            return $this->render('index', [
                'review' => $model, 
                'products' => $products,
            ]);
        }
    }
}
