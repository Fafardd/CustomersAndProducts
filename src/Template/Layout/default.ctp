<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

echo $this->Html->css(["https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css",
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css",
"Categories/basic.css"]);
echo $this->Html->script([
            "https://code.jquery.com/jquery-3.3.1.slim.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js",
            "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.js",
			"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        ]);
?>
<!DOCTYPE html>
<html>
<head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?php
        echo $this->Html->css([
            'base.css',
            'style.css',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
        ]);
        ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',

            'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
                ], ['block' => 'scriptLibraries']
        );
        ?>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    </head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                    <li>
                        <?php
                            echo $this->Html->link('Products', ['controller'=> 'Products'])
                        ?>
                    </li>
                    <li>
                        <?php
                        $loguser = $this->request->getSession()->read('Auth.User');
                        if ($loguser) {
                            $user = $loguser['email'];?>
                            <li><?php echo $this ->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]);?></li>
                            <li><?php echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']);?></li><?php
                        } else {
                            echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);
                        }
                        ?>
                    </li>
                <li><?php echo $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false])?></li>
                <li><?php echo $this->Html->link('Anglais', ['action' => 'changeLang', 'en_US'], ['escape' => false])?></li>
                <li><?php echo $this->Html->link('Espagnole', ['action' => 'changeLang', 'es'], ['escape' => false])?></li>
                <li>
					<?= $this->Html->link('A propos', ['controller' => 'Users', 'action' => 'aPropos']); ?>
				</li>
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
        <?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?>  
</body>
</html>
