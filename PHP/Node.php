<?php
/**
 * Information about a specific node.
 */
class Node
{
    /**
     * Node name.
     * 
     * @var string
     */
    public $name = "";

    /**
     * Construct using name.
     * 
     * @param string $name Node name.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
?>
