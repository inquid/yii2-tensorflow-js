<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 15/06/18
 * Time: 12:19 AM
 */

namespace inquid\tensorflowjs;


use yii\base\Widget;
use yii\helpers\Json;

class TensorflowWidget extends widget
{
    public $x1 = [1, 2, 3, 4];
    public $x2 = [1, 3, 5, 7];
    public $y1 = [4, 1];
    public $y2 = [4, 1];
    public $epochs = 10;
    public $testDataX = [5];
    public $testDataY = [1, 1];
    public $units = 1;
    public $inputShape = [1];
    public $loss="meanSquaredError";
    public $optimizer="sgd";

    public function init()
    {
        \inquid\tensorflowjs\TensorflowAssets::register($this->view);
        $this->view->registerJs('      // Notice there is no \'import\' statement. \'tf\' is available on the index-page
      // because of the script tag above.

      // Define a model for linear regression.
      const model = tf.sequential();
      model.add(tf.layers.dense({
        units: ' . $this->units . ',
        inputShape: ' . Json::encode($this->inputShape) . '
      }));

      // Prepare the model for training: Specify the loss and the optimizer.
      model.compile({
        loss: \''.$this->loss.'\',
        optimizer: \''.$this->optimizer.'\'
      });

      // Generate some synthetic data for training.
      const xs = tf.tensor2d(' . Json::encode($this->x1) . ', ' . Json::encode($this->y1) . ');
      const ys = tf.tensor2d(' . Json::encode($this->x2) . ', ' . Json::encode($this->y2) . ');

      //Show training data
      $("#xs").append(xs.toString());
      $("#ys").append(ys.toString());

      // Train the model using the data.
      model.fit(xs, ys, {
        epochs: ' . $this->epochs . '
      }).then(() => {
        // Use the model to do inference on a data point the model hasn\'t seen before:
        // Open the browser devtools to see the output
        test = tf.tensor2d(' . Json::encode($this->testDataX) . ', ' . Json::encode($this->testDataY) . ');
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
                </div>';
    }
}
