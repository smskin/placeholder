<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.03.2019
 * Time: 13:20
 */

use App\Requests\RenderRequest;

define( '__ROOT_DIR__', dirname(__DIR__. '../') );

require '../vendor/autoload.php';

(new RenderRequest())->execute();