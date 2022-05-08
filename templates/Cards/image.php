<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */

//  var_dump ($card);
//  echo "<br><hr><br>";
//  var_dump ($this);
//  echo "<br><hr><br>";
//  exit();

$this->disableAutoLayout();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RGS</title>
</head>
<body>

    <?= $this->Html->image('cards/'.$card->img, array()) ?>

</body>
</html>
