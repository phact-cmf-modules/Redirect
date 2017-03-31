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
 * @date 31/03/17 10:51
 */
namespace Modules\Redirect\Admin;

use Modules\Admin\Contrib\Admin;
use Modules\Redirect\Models\Redirect;

class RedirectAdmin extends Admin
{
    public function getSearchColumns()
    {
        return ['from', 'to'];
    }
    
    public function getModel()
    {
        return new Redirect;
    }
    
    public static function getName()
    {
        return 'Перенаправления';
    }

    public static function getItemName()
    {
        return 'Перенаправление';
    }
}