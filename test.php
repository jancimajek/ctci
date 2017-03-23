<?php

require_once './vendor/autoload.php';

use Janci\Ctci\DataStructures\BinaryTree;
use Janci\Ctci\DataStructures\Queue;

function testBinaryTree() {

    $bt = new BinaryTree();
    $bt->add(0);

    $bt->getRoot()->addLeft(3);
    $bt->getRoot()->addRight(1);

    $bt->getRoot()->getLeft()->addLeft(5);
    $bt->getRoot()->getLeft()->addRight(4);

    $bt->getRoot()->getRight()->addLeft(8);
    $bt->getRoot()->getRight()->addRight(2);

    $bt->getRoot()->getRight()->getLeft()->addRight(9);
    $bt->getRoot()->getRight()->getRight()->addRight(6);

    $bt->getRoot()->getRight()->getRight()->getRight()->addRight(7);

//    $bt->add(1);
//    $bt->add(2);
//    $bt->add(3);
//    $bt->add(4);
//    $bt->add(5);
//    $bt->add(6);
//    $bt->add(7);
//    $bt->add(8);
//    $bt->add(9);

    echo $bt . PHP_EOL;
    echo '[' . implode(', ', $bt->breadthFirstTraversal()) . ']';
}

function testQueue() {
    $q = new Queue();

    echo $q . PHP_EOL;
    var_dump($q->dequeue());
    var_dump($q->peak());

    $q->enqueue(1);
    $q->enqueue(2);
    $q->enqueue(3);
    $q->enqueue(4);

    echo $q . PHP_EOL;

    echo var_dump($q->peak());
    echo $q . PHP_EOL;

    var_dump($q->dequeue());
    echo $q . PHP_EOL;

    var_dump($q->dequeue());
    echo $q . PHP_EOL;

    echo var_dump($q->dequeue());
    echo $q . PHP_EOL;

    echo var_dump($q->dequeue());
    echo $q . PHP_EOL;
}

//testQueue();
testBinaryTree();
