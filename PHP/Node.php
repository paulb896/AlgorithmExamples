<?php
/**
 * Information about a specific node.
 */
class Node
{
    /**
     * @var string
     */
    public $name = "";

    /**
     * Construct using name.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
?>
