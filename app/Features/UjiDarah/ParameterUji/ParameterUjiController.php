<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\ParameterUji;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class ParameterUjiController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new ParameterUjiModel(),
            breadcrumbs: [
                ['Uji Darah', 'uji_darah'],
                ['Parameter Uji', 'parameter_uji'],
            ],
            title: 'Parameter Uji',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_parameter_uji', 'ID Parameter Uji'],
                [SHOW, REQUIRED, I::TEXT, 'nama_parameter', 'Nama Parameter'],
            ],
        );
    }   
}