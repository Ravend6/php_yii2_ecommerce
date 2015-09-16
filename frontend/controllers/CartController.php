<?php
namespace frontend\controllers;

use yii\web\Controller;
use backend\models\Order;
use backend\models\OrderItem;
use backend\models\Product;
use yz\shoppingcart\ShoppingCart;
use yii\web\NotFoundHttpException;

class CartController extends Controller
{

    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if ($product) {
            \Yii::$app->cart->put($product);
            // return $this->goBack();
            return $this->redirect('/cart/list');
        }
    }
    
    public function actionList()
    {
        /* @var $cart ShoppingCart */
        $cart = \Yii::$app->cart;
        $products = $cart->getPositions();
        $total = $cart->getCost();

        return $this->render('list', [
           'products' => $products,
           'total' => $total,
        ]);
    }

    public function actionRemove($id)
    {
        $product = Product::findOne($id);
        if ($product) {
            \Yii::$app->cart->remove($product);

            $this->redirect(['cart/list']);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdate($id, $quantity)
    {
        $product = Product::findOne($id);
        if ($product) {
            \Yii::$app->cart->update($product, $quantity);
            $this->redirect(['cart/list']);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionOrder()
    {
        $order = new Order();
        /* @var $cart ShoppingCart */
        $cart = \Yii::$app->cart;
        /* @var $products Product[] */
        $products = $cart->getPositions();
        $total = $cart->getCost();
        // echo var_dump($order->errors). "<br>";
        // echo var_dump($order->validate()). "<br>";
        // die('fdf');
        if ($total === 0) {
            \Yii::$app->session->addFlash('info', 'У вас корзина пуста.');
        }
        if ($order->load(\Yii::$app->request->post()) && $order->validate() && $total) {
            $transaction = $order->getDb()->beginTransaction();
            $order->total_price = $total;
            $order->save(false);

            foreach($products as $product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->title = $product->title;
                $orderItem->price = $product->getPrice();
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $product->getQuantity();
                if (!$orderItem->save(false)) {
                    $transaction->rollBack();
                    \Yii::$app->session->addFlash('error', 'Не можете оформить заказ. Пожалуйста свяжитесь с нами.');
                    return $this->redirect('catalog/list');
                }
            }
            $transaction->commit();
            \Yii::$app->cart->removeAll();
            $order->sendEmail('Новый Заказ', 'order');
            \Yii::$app->session->addFlash('success', 'Спасибо за ваш заказ. Мы свяжемся с Вами в ближайшее время.');
            return $this->goHome();
            // return $this->redirect('catalog/list');
        }
        return $this->render('order', [
            'order' => $order,
            'products' => $products,
            'total' => $total,
        ]);
    }
}