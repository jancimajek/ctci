<?php

namespace DataStructures;

use Janci\Ctci\DataStructures\DoubleLinkedList;
use Janci\Ctci\DataStructures\DoubleLinkedListElement;
use PHPUnit\Framework\TestCase;

class DoubleLinkedListTest extends TestCase
{
    public function testLinkedList() {
        $list = new DoubleLinkedList();
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

        $this->assertEquals((string)$list, '{0->1->2->3->4->5->6->7->8->9}' . PHP_EOL . '{0<-1<-2<-3<-4<-5<-6<-7<-8<-9}');

		$this->assertEquals($list->findFromHead(3)->getData(), 3);
		$this->assertNull($list->findFromHead(11));

		$this->assertEquals($list->findFromTail(3)->getData(), 3);
		$this->assertNull($list->findFromTail(11));

		$this->assertEquals($list->remove(3), new DoubleLinkedListElement(3));
        $this->assertEquals((string)$list, '{0->1->2->4->5->6->7->8->9}' . PHP_EOL . '{0<-1<-2<-4<-5<-6<-7<-8<-9}');

        $this->assertNull($list->remove(3));

        $this->assertEquals($list->remove(0), new DoubleLinkedListElement(0));
        $this->assertEquals((string)$list, '{1->2->4->5->6->7->8->9}' . PHP_EOL . '{1<-2<-4<-5<-6<-7<-8<-9}');

        $this->assertEquals($list->remove(9), new DoubleLinkedListElement(9));
        $this->assertEquals((string)$list, '{1->2->4->5->6->7->8}' . PHP_EOL . '{1<-2<-4<-5<-6<-7<-8}');
    }
}
