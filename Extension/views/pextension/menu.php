<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pextension */

$this->params["menu"] = [
    'label' => 'Proyectos',
    'icon' => 'fas fa-folder-open',
    'url' => ['/pextension/view'],
    'items' => [
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
            'url' => ['/objetivo-especifico/index?id='. $model->id_pext]
        ],
        ['label' => 'Presupuesto',
            'icon' => 'fas fa-file-alt',
            'url' => ['/presupuesto-extension/index?id=' . $model->id_pext]
        ],
    ]
];

