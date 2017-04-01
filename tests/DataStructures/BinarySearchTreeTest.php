<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\BinarySearchTree;
use Janci\Ctci\DataStructures\BinarySearchTreeNode;
use PHPUnit\Framework\TestCase;

class BinarySearchTreeTest extends TestCase
{
    /**
     * @var BinarySearchTree
     */
    private $bst;

	/**
	 *          7
	 *        /   \
	 *       4     10
	 *      / \   / \
	 *     3  5  8   13
	 *            \   \
	 *            9   15
	 *                 \
	 *                 20
	 */
    public function setUp()
    {
        $this->bst = new BinarySearchTree();
        $this->bst->add(7);
        $this->bst->add(4);
        $this->bst->add(10);
        $this->bst->add(3);
        $this->bst->add(5);
        $this->bst->add(8);
        $this->bst->add(13);
        $this->bst->add(9);
        $this->bst->add(15);
        $this->bst->add(20);

        parent::setUp();
    }

    public function testBinarySearchTree() {
        $this->assertEquals((string)$this->bst, json_encode(json_decode('
            {
                "value": 7,
                "left": {
                    "value": 4,
                    "left": {
                        "value": 3,
                        "left": null,
                        "right": null
                    },
                    "right": {
                        "value": 5,
                        "left": null,
                        "right": null
                    }
                },
                "right": {
                    "value": 10,
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
                        "value": 13,
                        "left": null,
                        "right": {
                            "value": 15,
                            "left": null,
                            "right": {
                                "value": 20,
                                "left": null,
                                "right": null
                            }
                        }
                    }
                }
            }'), JSON_PRETTY_PRINT)
        );
    }

    public function testHeight() {
        $this->assertEquals(0, $this->bst->getRoot()->getHeight());
        $this->assertEquals(1, $this->bst->getRoot()->getLeft()->getHeight());
        $this->assertEquals(1, $this->bst->getRoot()->getRight()->getHeight());
        $this->assertEquals(4, $this->bst->getRoot()->getRight()->getRight()->getRight()->getRight()->getHeight());
    }

    public function testLca() {
        $this->assertSame(
            $this->bst->getRoot()->getRight(),
            $this->bst->getRoot()->getRight()->getLeft()->getRight()->getLowestCommonAncestor(
                $this->bst->getRoot()->getRight()->getRight()->getRight()->getRight()
            )
        );

        $this->assertSame(
            $this->bst->getRoot()->getRight(),
            $this->bst->getRoot()->getRight()->getRight()->getRight()->getRight()->getLowestCommonAncestor(
                $this->bst->getRoot()->getRight()->getLeft()->getRight()
            )
        );

        $this->assertSame(
            $this->bst->getRoot(),
            $this->bst->getRoot()->getLowestCommonAncestor(
                $this->bst->getRoot()
            )
        );

        $this->expectException('RuntimeException');
        $this->expectExceptionMessage('Invalid Binary Tree: Nodes are not part of the same tree');

        $this->bst->getRoot()->getLowestCommonAncestor(
            new BinarySearchTreeNode(666)
        );

        $this->bst->getRoot()->getLeft()->getLowestCommonAncestor(
            new BinarySearchTreeNode(666)
        );
    }

    public function testBreadthFirstTraversal() {
        $this->assertEquals($this->bst->breadthFirstTraversal(), [7,4,10,3,5,8,13,9,15,20]);
    }
}
