<?php

namespace App\Faq\Actions;

use App\Admin\DatabaseAdminAuth;
use App\Faq\Database\QuestionTable;
use ClientX\Actions\Action;
use ClientX\Session\FlashService;
use ClientX\Translator\Translater;
use Psr\Http\Message\ServerRequestInterface as Request;

class FaqSwitchAction extends Action
{

    private QuestionTable $table;

    public function __construct(QuestionTable $table, DatabaseAdminAuth $auth, FlashService $flash, Translater $translater)
    {
        $this->table = $table;
        $this->flash = $flash;
        $this->auth = $auth;
        $this->translater = $translater;
    }

    /**
     * @throws \ClientX\Exception\JsonEncoderException
     */
    public function __invoke(Request $request): \Psr\Http\Message\ResponseInterface
    {

        $ids = explode(',', $request->getParsedBody()['groups']);
        $position = 1;
        foreach ($ids as $id) {
            $this->table->update($id, ['position' => $position++]);
        }
        $this->success($this->trans("configuration.update"));
        return $this->json(['success' => true]);
    }
}