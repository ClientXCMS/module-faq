<?php
namespace App\Faq\Actions;

use App\Faq\Database\QuestionTable;
use ClientX\Actions\Action;
use ClientX\Renderer\RendererInterface;

class FaqAction extends Action
{
    private QuestionTable $table;
    public function __construct(RendererInterface $renderer, QuestionTable $table)
    {
        $this->renderer = $renderer;
        $this->table = $table;
    }

    public function __invoke(): string
    {
        return $this->render('@faq/index', ['items' => $this->table->findNotHidden()]);
    }
}
