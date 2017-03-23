<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\BinaryTree;
use PHPUnit\Framework\TestCase;

class BinaryTreeTest extends TestCase
{
    private $bt;
    public function setUp()
    {
        $this->bt = new BinaryTree();
        $this->bt->add(0);

        $this->bt->getRoot()->addLeft(3);
        $this->bt->getRoot()->addRight(1);

        $this->bt->getRoot()->getLeft()->addLeft(5);
        $this->bt->getRoot()->getLeft()->addRight(4);

        $this->bt->getRoot()->getRight()->addLeft(8);
        $this->bt->getRoot()->getRight()->addRight(2);

        $this->bt->getRoot()->getRight()->getLeft()->addRight(9);
        $this->bt->getRoot()->getRight()->getRight()->addRight(6);

        $this->bt->getRoot()->getRight()->getRight()->getRight()->addRight(7);
        
        parent::setUp();
    }

    public function testBinaryTree() {
        $this->assertEquals((string)$this->bt, json_encode(json_decode('
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
            }'), JSON_PRETTY_PRINT)
        );
    }

    public function testBreadthFirstTraversal() {
        $this->assertEquals($this->bt->breadthFirstTraversal(), [0,3,1,5,4,8,2,9,6,7]);
    }
}
