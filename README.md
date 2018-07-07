Tensorflow JS Yii2 integration
==============================
Widgets and useful stuff to use tensorflow js on Yii2
![alt text](https://raw.githubusercontent.com/inquid/yii2-tensorflow-js/master/Tensorflow_logo.svg.png)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist inquid/yii2-tensorflow-js "*"
```

or add

```
"inquid/yii2-tensorflow-js": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \inquid\tensoflowjs\TensorflowWidget::widget(['x1'=>[1, 2, 3, 4],'x2'=>[1, 3, 5, 7],'y1'=>[4,1],'y2'=>[4,1],'epochs'=>11]); ?>```
