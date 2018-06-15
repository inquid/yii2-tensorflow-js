<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 15/06/18
 * Time: 12:19 AM
 */

namespace app\components;


use yii\base\Widget;

class TensorflowWidget extends widget
{
    public function init()
    {
        TensorflowAssets::register($this->view);
        $this->view->registerCss('
        body {
  display: flex;
  justify-content: center;
  padding-top: 5%;
  margin-left: -3%;
}

@media (max-width: 480px) {
  body {
    padding-top: 5%;
    margin-left: -5%;
  }
}

.logo {
  position: relative;
  z-index: 1;
}

.logo *,
.logo *::before,
.logo *::after {
  box-sizing: border-box;
  display: block;
}

.logo .cube1 {
  height: 130px;
  width: 400px;
  position: absolute;
  left: 0;
  top: 0;
  background: #fbbb35;
  -webkit-transform: rotateX(60deg) rotateZ(45deg) translate(0px, 0px);
  transform: rotateX(60deg) rotateZ(45deg) translate(0px, 0px);
}

@media (max-width: 480px) {
  .logo .cube1 {
    height: 43.3333333333px !important;
    width: 133.3333333333px !important;
  }
}

.logo .cube1:before {
  height: 400px;
  width: 150px;
  content: \'\';
  position: absolute;
  background: #ee6429;
  -webkit-transform: skewY(45deg) skewX(-45deg) translate(3%, -49%);
  transform: skewY(45deg) skewX(-45deg) translate(3%, -49%);
}

@media (max-width: 480px) {
  .logo .cube1:before {
    height: 133.3333333333px !important;
    width: 50px !important;
  }
}

.logo .cube1:after {
  height: 130px;
  width: 150px;
  content: \'\';
  position: absolute;
  left: 70%;
  background: #f59121;
  -webkit-transform: skewY(45deg) translate(80%, -34%);
  transform: skewY(45deg) translate(80%, -34%);
}

@media (max-width: 480px) {
  .logo .cube1:after {
    height: 43.3333333333px !important;
    width: 50px !important;
  }
}

.logo .cube2 {
  height: 130px;
  width: 130px;
  position: absolute;
  left: 0;
  top: 0;
  background: #fbbb35;
  -webkit-transform: rotateX(60deg) rotateZ(45deg) translate(-31%, 25%);
  transform: rotateX(60deg) rotateZ(45deg) translate(-31%, 25%);
}

@media (max-width: 480px) {
  .logo .cube2 {
    height: 43.3333333333px !important;
    width: 43.3333333333px !important;
  }
}

.logo .cube2:before {
  height: 130px;
  width: 700px;
  content: \'\';
  position: absolute;
  background: #ee6429;
  -webkit-transform: skewY(45deg) skewX(-45deg) translate(59%, 269%);
  transform: skewY(45deg) skewX(-45deg) translate(59%, 269%);
}

@media (max-width: 480px) {
  .logo .cube2:before {
    height: 43.3333333333px !important;
    width: 233.3333333333px !important;
  }
}

.logo .cube2:after {
  height: 130px;
  width: 701px;
  content: \'\';
  position: absolute;
  left: 0;
  background: #f59121;
  -webkit-transform: skewY(45deg) translate(18.3%, 170%);
  transform: skewY(45deg) translate(18.3%, 170%);
}

@media (max-width: 480px) {
  .logo .cube2:after {
    height: 43.3333333333px !important;
    width: 233.6666666667px !important;
  }
}

.logo .cube3 {
  height: 270px;
  width: 130px;
  position: absolute;
  left: 0;
  top: 0;
  background: #fbbb35;
  -webkit-transform: rotateX(60deg) rotateZ(45deg) translate(-108%, 48%);
  transform: rotateX(60deg) rotateZ(45deg) translate(-108%, 48%);
}

@media (max-width: 480px) {
  .logo .cube3 {
    height: 90px !important;
    width: 43.3333333333px !important;
  }
}

.logo .cube3:before {
  height: 130px;
  width: 150px;
  content: \'\';
  position: absolute;
  background: #ee6429;
  -webkit-transform: skewY(45deg) skewX(-45deg) translate(187%, 165%);
  transform: skewY(45deg) skewX(-45deg) translate(187%, 165%);
}

@media (max-width: 480px) {
  .logo .cube3:before {
    height: 43.3333333333px !important;
    width: 50px !important;
  }
}

.logo .cube3:after {
  height: 302px;
  width: 150px;
  content: \'\';
  position: absolute;
  left: 0;
  background: #f59121;
  -webkit-transform: skewY(45deg) translate(86.5%, -28%);
  transform: skewY(45deg) translate(86.5%, -28%);
}

@media (max-width: 480px) {
  .logo .cube3:after {
    height: 100.6666666667px !important;
    width: 50px !important;
  }
}

.logo .cube4 {
  height: 130px;
  width: 150px;
  position: absolute;
  left: 0;
  top: 0;
  background: #fbbb35;
  -webkit-transform: rotateX(60deg) rotateZ(45deg) translate(250%, 250%);
  transform: rotateX(60deg) rotateZ(45deg) translate(250%, 250%);
}

@media (max-width: 480px) {
  .logo .cube4 {
    height: 43.3333333333px !important;
    width: 50px !important;
  }
}

.logo .cube4:before {
  height: 150px;
  width: 150px;
  content: \'\';
  position: absolute;
  background: #ee6429;
  -webkit-transform: skewY(45deg) skewX(-45deg) translate(87%, 38%);
  transform: skewY(45deg) skewX(-45deg) translate(87%, 38%);
}

@media (max-width: 480px) {
  .logo .cube4:before {
    height: 50px !important;
    width: 50px !important;
  }
}

.logo .cube4:after {
  height: 131px;
  width: 150px;
  content: \'\';
  position: absolute;
  left: 0;
  background: #f59121;
  -webkit-transform: skewY(45deg) translate(99%, -56%);
  transform: skewY(45deg) translate(99%, -56%);
}

@media (max-width: 480px) {
  .logo .cube4:after {
    height: 43.6666666667px !important;
    width: 50px !important;
  }
}

        ');
        $this->view->registerJs('      // Notice there is no \'import\' statement. \'tf\' is available on the index-page
      // because of the script tag above.

      // Define a model for linear regression.
      const model = tf.sequential();
      model.add(tf.layers.dense({
        units: 1,
        inputShape: [1]
      }));

      // Prepare the model for training: Specify the loss and the optimizer.
      model.compile({
        loss: \'meanSquaredError\',
        optimizer: \'sgd\'
      });

      // Generate some synthetic data for training.
      const xs = tf.tensor2d([1, 2, 3, 4], [4, 1]);
      const ys = tf.tensor2d([1, 3, 5, 7], [4, 1]);

      //Show training data
      $("#xs").append(xs.toString());
      $("#ys").append(ys.toString());

      // Train the model using the data.
      model.fit(xs, ys, {
        epochs: 10
      }).then(() => {
        // Use the model to do inference on a data point the model hasn\'t seen before:
        // Open the browser devtools to see the output
        test = tf.tensor2d([5], [1, 1]);
        $("#test").append(test.toString());
        model.predict(test).print();
        $("#prediction").append(model.predict(test).toString());
      });
');
    }

    public function run()
    {
        return '<div id="xs">
                  XS:
                </div>
                <div id="ys">
                  YS:
                </div>
                <div id="test">
                  Test Data:
                </div>
                <div id="prediction">
                  Prediction:
                </div>
                <div class="logo">
                  <div class="cube1"></div>
                  <div class="cube2"></div>
                  <div class="cube3"></div>
                  <div class="cube4"></div>
                </div>';
    }
}