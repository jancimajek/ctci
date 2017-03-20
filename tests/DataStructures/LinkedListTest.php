<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\LinkedList;
use Janci\Ctci\DataStructures\LinkedListElement;
use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase
{
    public function testLinkedList() {
        $list = new LinkedList();
        $list->addToTail(0);
        $list->addToTail(1);
        $list->addToTail(2);
        $list->addToTail(3);
        $list->addToTail(4);
        $list->addToTail(5);
        $list->addToTail(6);
        $list->addToTail(7);
        $list->addToTail(8);
        $list->addToTail(9);

        $this->assertEquals((string)$list, '{0->1->2->3->4->5->6->7->8->9}');

        $this->assertEquals($list->find(3)->getData(), 3);
        $this->assertNull($list->find(11));

        $this->assertEquals($list->remove(3), new LinkedListElement(3));
        $this->assertEquals((string)$list, '{0->1->2->4->5->6->7->8->9}');

        $this->assertNull($list->remove(3));

        $this->assertEquals($list->remove(0), new LinkedListElement(0));
        $this->assertEquals((string)$list, '{1->2->4->5->6->7->8->9}');

        $this->assertEquals($list->remove(9), new LinkedListElement(9));
        $this->assertEquals((string)$list, '{1->2->4->5->6->7->8}');
    }
}
