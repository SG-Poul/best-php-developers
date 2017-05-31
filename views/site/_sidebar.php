<?php
/**
 * Created by PhpStorm.
 * User: Pavel.R
 * Date: 31.05.2017
 * Time: 14:51
 */

use kartik\sidenav\SideNav;
use yii\helpers\Url;

$type = SideNav::TYPE_DEFAULT;

echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    'indItem' => '',
    'indMenuOpen' => '<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>',
    'indMenuClose' => '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>',
    'items' => [
        // Important: you need to specify url as 'controller/action',
        // not just as 'controller' even if default action is used.
        //
        // NOTE: The variable `$item` is specific to this demo page that determines
        // which menu item will be activated. You need to accordingly define and pass
        // such variables to your view object to handle such logic in your application
        // (to determine the active status).
        //
        ['label' => '<strong>Company</strong>', 'active' => ($group == 'company'), 'items' => [
            ['label' => 'About us', 'url' => Url::to(['/site/about', 'type'=>$type]), 'active' => ($item == 'about')],
            ['label' => 'Certifications', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'certifications')],
            ['label' => 'Education services', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'education')],
            ['label' => 'Our Partners', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'partners')],
            ['label' => 'Our People', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'people')],
            ['label' => 'Testimonials', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'testimonials')],
            ['label' => 'Vision and Values', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'vision')],
            ['label' => 'Our photos', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'photos')],
            ['label' => 'Clients', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'clients')],
            ['label' => 'Why Best-PHP-Developers', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'why')],
        ]],

        ['label' => '<strong>Services</strong>', 'items' => [
            ['label' => 'PHP Consulting', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'consulting')],
            ['label' => 'PHP Outsourcing', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'outsourcing')],
            ['label' => 'PHP Services', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'services')],
            ['label' => 'PHP Staffing', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'staffing')],
            ['label' => 'PHP Training', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'training')],
            ['label' => 'PHP Prices', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'prices')],
        ]],

        ['label' => '<strong>Developers<strong>', 'items' => [
            ['label' => 'Dedicated PHP Team', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'team')],
            ['label' => 'Hire PHP Developers', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'hire')],
            ['label' => 'PHP Coders', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'coders')],
            ['label' => 'PHP Development', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'development')],
            ['label' => 'PHP Programming', 'url' => Url::to(['/site/#', 'type'=>$type]), 'active' => ($item == 'programming')],
        ]],
    ],
]);