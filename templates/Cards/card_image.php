<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 * @var 
 */
$this->disableAutoLayout();
$msg = null;
if ($lang == "es") $msg = $card->descriptionEs;
if ($lang == "fr") $msg = $card->descriptionFr;
if ($lang == "en") $msg = $card->descriptionEn;


// var_dump ($card);
// var_dump ($lang);

// exit();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CrudRGS:
        Cards    </title>
    <link href="/crud2/favicon.ico" type="image/x-icon" rel="icon"/><link href="/crud2/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    
	<link rel="stylesheet" href="/crud2/css/normalize.min.css"/>
	<link rel="stylesheet" href="/crud2/css/milligram.min.css"/>
	<link rel="stylesheet" href="/crud2/css/cake.css"/>

</head>

<body>
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="column-responsive column-80">
                   <?= $this->Html->image('cards/'.$card->img, array('width'=>300)) ?>
                </div> 
            </div>

            <div class="row">

                <div class="column-responsive column-80">
                    <div class="text">
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($msg)); ?>
                    </blockquote>
                    </div>
                </div> 
            </div>


        </div> <!-- </div> container -->
    </main>
</body>
