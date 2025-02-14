<?php

namespace App\Http\Controllers;

use App\Models\MasterProduct;
use Idev\EasyAdmin\app\Http\Controllers\DefaultController;

class MasterProductController extends DefaultController
{
    protected $modelClass = MasterProduct::class;
    protected $title;
    protected $generalUri;
    protected $tableHeaders;
    // protected $actionButtons;
    // protected $arrPermissions;
    protected $importExcelConfig;

    public function __construct()
    {
        $this->title = 'Master Product';
        $this->generalUri = 'master-product';
        // $this->arrPermissions = [];
        $this->actionButtons = ['btn_edit', 'btn_show', 'btn_delete'];

        $this->tableHeaders = [
                    ['name' => 'No', 'column' => '#', 'order' => true],
                    ['name' => 'Code', 'column' => 'code', 'order' => true],
                    ['name' => 'Name', 'column' => 'name', 'order' => true],
                    ['name' => 'Description', 'column' => 'description', 'order' => true],
                    ['name' => 'Price', 'column' => 'price', 'order' => true],
                    ['name' => 'Created at', 'column' => 'created_at', 'order' => true],
                    ['name' => 'Updated at', 'column' => 'updated_at', 'order' => true],
        ];


        $this->importExcelConfig = [
            'primaryKeys' => ['code'],
            'headers' => [
                    ['name' => 'Code', 'column' => 'code'],
                    ['name' => 'Name', 'column' => 'name'],
                    ['name' => 'Description', 'column' => 'description'],
                    ['name' => 'Price', 'column' => 'price'],
            ]
        ];
    }


    protected function fields($mode = "create", $id = '-')
    {
        $edit = null;
        if ($id != '-') {
            $edit = $this->modelClass::where('id', $id)->first();
        }

        $fields = [
                    [
                        'type' => 'text',
                        'label' => 'Code',
                        'name' =>  'code',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('code', $id),
                        'value' => (isset($edit)) ? $edit->code : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Name',
                        'name' =>  'name',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('name', $id),
                        'value' => (isset($edit)) ? $edit->name : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Description',
                        'name' =>  'description',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('description', $id),
                        'value' => (isset($edit)) ? $edit->description : ''
                    ],
                    [
                        'type' => 'text',
                        'label' => 'Price',
                        'name' =>  'price',
                        'class' => 'col-md-12 my-2',
                        'required' => $this->flagRules('price', $id),
                        'value' => (isset($edit)) ? $edit->price : ''
                    ],
        ];

        return $fields;
    }


    protected function rules($id = null)
    {
        $rules = [
                    'code' => 'required|string',
                    'name' => 'required|string',
                    'description' => 'required|string',
                    'price' => 'required|string',
        ];

        return $rules;
    }

}
