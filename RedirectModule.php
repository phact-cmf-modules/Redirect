<?php

/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @company HashStudio
 * @site http://hashstudio.ru
 * @date 31/03/17 08:29
 */
namespace Modules\Redirect;

use Modules\Redirect\Models\Redirect;
use Phact\Main\Phact;
use Phact\Module\Module;
use Modules\Admin\Traits\AdminTrait;
use Phact\Orm\Q;

class RedirectModule extends Module
{
    use AdminTrait;

    public static function onApplicationRun()
    {
        parent::onApplicationRun();
        if (Phact::app()->getIsWebMode()) {
            $request = Phact::app()->request;
            $path = urldecode($request->getPath());

            $pathTrimmed = rtrim($path, '/');
            $pathSlashed = $pathTrimmed . '/';

            $redirect = Redirect::objects()->filter([
                Q::orQ(['from' => $pathTrimmed], ['from' => $pathSlashed])
            ])->limit(1)->get();

            if ($redirect && $redirect->to) {
                $request->redirect($redirect->to);
            }
        }
    }
}
