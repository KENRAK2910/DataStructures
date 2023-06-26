<?php

class Node
{
    public $data;
    public $left;
    public $right;

    public function __construct(int $number = 0)
    {
        $this->data = $number;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insertNumber(int $number = 0)
    {
        $newNode = new Node($number);

        if($this->root === null)
        {
            $this->root = $newNode;
        }else
        {
            $this->createNode($this->root, $newNode);
        }
    }

    public function createNode(&$currentNode, Node &$newNode = null)
    {
        if($currentNode === null)
        {
            $currentNode = $newNode;
        } else {
            if($newNode->data < $currentNode->data)
            {
                $this->createNode($currentNode->left, $newNode);
            }else
            {
                $this->createNode($currentNode->right, $newNode);
            }
        }
    }

    public function search(int $nubmerToSearch = 0)
    {
        if(isset($this->root) && $this->root->data === $nubmerToSearch)
        {
            return $this->root;
        }else
        {
            return $this->searchTree($this->root, $nubmerToSearch);
        }
    }

    public function searchTree($node, int $nubmerToSearch = 0)
    {
        if($node === null || $node->data == $nubmerToSearch) return $node;
        
        if($nubmerToSearch < $node->data)
        {
            return $this->searchTree($node->left, $nubmerToSearch);
        }else
        {
            return $this->searchTree($node->right, $nubmerToSearch);
        }
    }

}


$bst = new BinarySearchTree();

$bst->insertNumber(100);
$bst->insertNumber(50);
$bst->insertNumber(150);
$bst->insertNumber(200);



$node = $bst->search(50);

if(is_null($node))
{
    echo "Node not found.";
}else
{
    echo "Node found.";
    print_r($node);
}
