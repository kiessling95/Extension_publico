<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Pextension */
if(!isset($url)){
    $url = substr(Url::to(),0,strpos(Url::to(), '?'));
}

$this->params["menu"] = [
    'label' => 'Proyectos',
    'icon' => 'fas fa-folder-open',
    'url' => [$url],
    'items' => [
        ['label' => 'Datos Principales',
            'icon' => 'fas fa-file-alt',
            'url' => ['/pextension/view/'. $model->id_pext]
        ],
        ['label' => 'Integrantes',
            'icon' => 'fas fa-folder-open',
            'items' => [
                ['label' => 'Integrantes Docentes',
                    'icon' => 'fas fa-file-alt',
                    'url' => ['/integrante-interno-pe/index?id=' . $model->id_pext]
                ],
                ['label' => 'Integrantes Otros',
                    'icon' => 'fas fa-file-alt',
                    'url' => ['/integrante-externo-pe/index?id=' . $model->id_pext]
                ],
            ]
        ],
        ['label' => 'Organizaciones participantes',
            'icon' => 'fas fa-file-alt',
            'url' => ['/organizaciones-participantes/index?id=' . $model->id_pext]
        ],
        ['label' => 'Destinatarios',
            'icon' => 'fas fa-file-alt',
            'url' => ['/destinatario/index?id=' . $model->id_pext]
        ],
        ['label' => 'Objetivos y Actividades',
            'icon' => 'fas fa-file-alt',
            'url' => ['/objetivo-especifico/index?id=' . $model->id_pext]
        ],
        ['label' => 'Presupuesto',
            'icon' => 'fas fa-file-alt',
            'url' => ['/presupuesto-extension/index?id=' . $model->id_pext]
        ],
        
        ['label' => 'Avances',
            'icon' => 'fas fa-file-alt',
            'url' => ['/avance/index?id=' . $model->id_pext]
        ],
        ['label' => 'Solicitudes',
            'icon' => 'fas fa-file-alt',
            'url' => ['/solicitud/index?id=' . $model->id_pext]
        ],
    ]
];

