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

        $this->assertEquals('{0->1->2->3->4->5->6->7->8->9}', (string)$list);

        $this->assertEquals(3, $list->find(3)->getData());
        $this->assertNull($list->find(11));

        $this->assertEquals(new LinkedListElement(3), $list->remove(3));
        $this->assertEquals('{0->1->2->4->5->6->7->8->9}', (string)$list);

        $this->assertNull($list->remove(3));

        $this->assertEquals(new LinkedListElement(0), $list->remove(0));
        $this->assertEquals('{1->2->4->5->6->7->8->9}', (string)$list);

        $this->assertEquals(new LinkedListElement(9), $list->remove(9));
        $this->assertEquals('{1->2->4->5->6->7->8}', (string)$list);
    }
}
