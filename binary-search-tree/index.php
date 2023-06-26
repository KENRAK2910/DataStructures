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
        static $a=1;echo$a++."\n";

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
/*-----------------------------*/
$bst = new BinarySearchTree();

$bst->insertNumber(1000);
$bst->insertNumber(500);
$bst->insertNumber(1500);
$bst->insertNumber(250);
$bst->insertNumber(750);
$bst->insertNumber(1250);
$bst->insertNumber(1750);
$bst->insertNumber(250);
$bst->insertNumber(750);
$bst->insertNumber(1250);
$bst->insertNumber(1750);

/*
The above insertion will create a Binary Search Tree like:

                                    ( 1000 )
                                     /   \
                                    /     \
                                   /       \
                                  /         \
                                 /           \
                            ( 500 )           ( 1500 )
                             / \                / \
                            /   \              /   \
                           /     \            /     \
                          /       \          /       \
                     ( 250 )   ( 750 )  ( 1250 )   ( 1750 )
                       / \                / \
                      /   \              /   \
                     /     \            /     \
                    /       \          /       \
                 ( 250 )   ( 750 )  ( 1250 )   ( 1750 )
                   / \
                  /   \
                 /     \
                /       \
            ( 200 )   ( 275 )
             / \
            /   \
           /     \
          /       \
      ( 150 )   ( 260 )
*/

$node = $bst->search(150); // It takes only 4 iteration to search 150 in the Tree (out of total 15 numbers). This shows the power of Binary Search Trees.

if(is_null($node))
{
    echo "Node not found.";
}else
{
    echo "Node found.";
    print_r($node);
}
