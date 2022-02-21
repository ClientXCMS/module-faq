<?php

use App\Faq\Actions\FaqCrudAction;
use App\Faq\FAQAdminItem;
use ClientX\Navigation\DefaultMainItem;
use function DI\add;
use function DI\get;

return [
    'navigation.main.items' => add([new DefaultMainItem([DefaultMainItem::makeItem('FAQ', 'faq.index', 'fa fa-question')], 80)]),
    "admin.menu.items" => add(get(FAQAdminItem::class)),
    'csrf.except' => add('faq.admin.switch'),
    'permissions.list' => add([
        FaqCrudAction::class => 'faq'
    ])
];
