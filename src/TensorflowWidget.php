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
