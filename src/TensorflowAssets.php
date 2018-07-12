<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 6/10/17
 * Time: 03:05 PM
 */
namespace inquid\tensorflowjs;
use yii\web\AssetBundle;

class TensorflowAssets extends AssetBundle
{
    public $js = ['https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.11.6'];
    public $depends = ['yii\web\JqueryAsset'];
}
