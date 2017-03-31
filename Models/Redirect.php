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
 * @date 31/03/17 08:30
 */
namespace Modules\Redirect\Models;

use Phact\Orm\Fields\CharField;
use Phact\Orm\Model;

class Redirect extends Model
{
    public static function getFields() 
    {
        return [
            'from' => [
                'class' => CharField::class,
                'label' => 'Откуда'
            ],
            'to' => [
                'class' => CharField::class,
                'label' => 'Куда'
            ],
        ];
    }
    
    public function __toString() 
    {
        return $this->from . ' > ' . $this->to;
    }
} 