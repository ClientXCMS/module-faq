<?php

use App\Faq\FAQAdminItem;
use ClientX\Navigation\DefaultMainItem;
use function DI\add;
use function DI\get;

return [
    'navigation.main.items' => add([new DefaultMainItem([DefaultMainItem::makeItem('faq.title', 'faq.index', 'fa fa-question')], 80)]),
    "admin.menu.items" => add(get(FAQAdminItem::class)),
    'csrf.except' => add('faq.admin.switch')
];
