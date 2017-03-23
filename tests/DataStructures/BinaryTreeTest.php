<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\BinaryTree;
use PHPUnit\Framework\TestCase;

class BinaryTreeTest extends TestCase
{
    public function testBinaryTree() {
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

        $expectedBtJson = json_encode(json_decode('
        {
            "value": 0,
            "left": {
                "value": 3,
                "left": {
                    "value": 5,
                    "left": null,
                    "right": null
                },
                "right": {
                    "value": 4,
                    "left": null,
                    "right": null
                }
            },
            "right": {
                "value": 1,
                "left": {
                    "value": 8,
                    "left": null,
                    "right": {
                        "value": 9,
                        "left": null,
                        "right": null
                    }
                },
                "right": {
                    "value": 2,
                    "left": null,
                    "right": {
                        "value": 6,
                        "left": null,
                        "right": {
                            "value": 7,
                            "left": null,
                            "right": null
                        }
                    }
                }
            }
        }'), JSON_PRETTY_PRINT);

        $this->assertEquals((string)$bt, $expectedBtJson);
        $this->assertEquals($bt->breadthFirstTraversal(), [0,3,1,5,4,8,2,9,6,7]);

    }
}
