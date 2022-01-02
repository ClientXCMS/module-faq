<?php

namespace App\Faq;

use ClientX\Renderer\RendererInterface;

class FAQAdminItem implements \ClientX\Navigation\NavigationItemInterface
{

    /**
     * @inheritDoc
     */
    public function getPosition(): int
    {
        return 50;
    }

    /**
     * @inheritDoc
     */
    public function render(RendererInterface $renderer): string
    {
        return $renderer->render('@faq_admin/menu');
    }
}