<?php
namespace App\Faq;

use App\Faq\Actions\FaqAction;
use App\Faq\Actions\FaqCrudAction;
use App\Faq\Actions\FaqSwitchAction;
use ClientX\Module;
use ClientX\Renderer\RendererInterface;
use ClientX\Router;
use ClientX\Theme\ThemeInterface;
use Psr\Container\ContainerInterface;

class FaqModule extends Module
{

    const MIGRATIONS = __DIR__ . '/db/migrations';
    const DEFINITIONS =  __DIR__ . "/config.php";

    const TRANSLATIONS = [
        "fr_FR" => __DIR__ . "/trans/fr.php",
        "en_GB" => __DIR__ . "/trans/en.php",
        "uk_UA" => __DIR__ . "/trans/ua.php",
        "es_ES" => __DIR__ . "/trans/es.php",
        "ja_JP" => __DIR__ . "/trans/ja.php"
    ];
    public function __construct(Router $router, ThemeInterface $theme, ContainerInterface $container, RendererInterface $renderer)
    {
        $adminPrefix = $container->get('admin.prefix');

        $renderer->addPath('faq', $theme->getViewsPath() . '/FAQ');
        $renderer->addPath('faq_admin', __DIR__ . '/Views');
        $router->get('/faq', FaqAction::class, 'faq.index');
        $router->crud($adminPrefix. '/faq', FaqCrudAction::class, 'faq.admin');
        $router->post($adminPrefix. '/faq/switch', FaqSwitchAction::class, 'faq.admin.switch');
    }
}
