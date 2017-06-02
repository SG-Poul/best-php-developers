<?php
/**
 * Created by PhpStorm.
 * User: Pavel.R
 * Date: 31.05.2017
 * Time: 14:51
 */

use yii\helpers\Url;
use yii\web\View;

$currentGroup = $content->category;
$currentItem = $content->url;
$this->registerJs(
    "
//    $(function () {
//        $('#" . $currentGroup . "').addClass('open');
//    });
   
    ",
    View::POS_READY,
    'my-button-handler'
);

?>

<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach ($list as $group => $value): ?>
                    <li class="dropdown <?php if ($currentGroup ==  $group) echo "open" ?>">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?= $group ?></a>
                        <ul class="dropdown-menu forAnimate " role="menu" id="<?= $group ?>">
                            <?php foreach ($value as $page): ?>
                                <li>
                                    <a href="/site/company/<?= $page['url'] ?>"
                                        <?php if ($currentItem ==  $page['url']): ?>
                                            style="color: orange;"
                                        <?php endif; ?>
                                    >
                                        <?= $page['name']?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
