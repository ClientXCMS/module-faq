<?php

namespace App\Faq\Actions;

use ClientX\Actions\CrudAction;
use App\Faq\Database\QuestionTable as Table;
use ClientX\Renderer\RendererInterface;
use ClientX\Router;
use ClientX\Session\FlashService;
use ClientX\Validator;
use Psr\Http\Message\ServerRequestInterface as Request;

class FaqCrudAction extends CrudAction
{
    protected $viewPath = "@faq_admin";
    protected $routePrefix = "faq.admin";
    protected $moduleName = "FAQ";
    protected $fillable = ['name', 'answer', 'icon'];


    public function __construct(RendererInterface $renderer, Table $table, Router $router, FlashService $flash)
    {
        parent::__construct($renderer, $table, $router, $flash);
    }

    public function getValidator(Request $request): Validator
    {
        return parent::getValidator($request)->notEmpty('name', 'answer');
    }
}