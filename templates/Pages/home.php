<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
/* ----------------------------------------------------------------------------------------
//recuperamos el estado de la session para saber si hay un usuario activo registrado
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
$userName = $session->read('Auth.User.name');

if ($userName == null)
    $this->disableAutoLayout();

*/

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'crudRGS: OUR LIFE-SAVING RULES';

    //read the dictory for show the rules ---------------      
    $directory= WWW_ROOT.'/img/raw';
    $files = scandir($directory);
    
    if ($files[0]=='.' && $files[1]='..')
        array_splice($files,0,2);
    
    
  
    
    
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">

            <?php

                //recuperamos el estado de la session para saber si hay un usuario activo registrado
                $session = $this->request->getSession();
                $session = $this->request->getAttribute('session');
                $userName = $session->read('Auth.User.name');

                

                if ($userName == null){
                   
                    $this->disableAutoLayout();
                         
            ?>
             <div class="row">
                    <div class="column column-offset-75">
                        <a class="button" href="users/login">LOGIN</a>
                        
                    </div>
                </div>
            <?php } //end if user logeado ?>
            

            <br><br>
            <h1>
                Welcome to crudRGS 
            </h1>
            <h1>Our life savings rules</h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <img src="webroot/img/fodo_reglas.png" alt="backimage">
                </div>
                
                                
                                              
                        <?php 
                        
                        for ($i=0; $i< count($files); $i=$i+2){ ?>
                            <div class="row">
                                <div class="column text-center"> 
                                    <img class="" src='<?="webroot/img/raw/$files[$i]"?>' alt="">
                                </div>
                                <?php $j = $i+1; if ($j<count($files)) {?>
                                <div class="column text-center"> 
                                    <img src='<?="webroot/img/raw/$files[$j]"?>' alt="">
                                </div>
                                
                                <?php } ?>
                                <br>
                            </div>
                           

                        <?php } ?>
                                    
                
               
            </div>
        </div>
    </main>
    
</body>
</html>