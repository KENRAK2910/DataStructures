<?php

//  (1) -> (2) -> (3)

class Node
{
    public $data;
    public $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}


class LinkedList
{
    public $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function isEmpty()
    {
        return $this->head === null;
    }

    public function insertData($data = null)
    {
        $newNode = new Node($data);

        if($this->isEmpty())
        {
            $this->head = $newNode;
        }else
        {
            $current = $this->head;

            while($current->next !== null)
            {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function display()
    {
        $current = $this->head;
        while($current !== null)
        {
            echo $current->data . "\n";

            $current = $current->next;
        }
    }
}


$linekdList = new LinkedList();
$linekdList->insertData(10);
$linekdList->insertData(13);
$linekdList->insertData(16);
$linekdList->insertData(18);


$linekdList->display();
