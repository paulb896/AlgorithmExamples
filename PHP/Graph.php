<?php
/**
 * Contains node and node connection logic.
 */
class Graph
{
    /**
     * Array of all edges between nodes.
     * @var array
     */
    public $edges = array();
    
    /**
     * Array of all nodes in graph.
     * @var array
     */
    public $nodes = array();

    /**
     * Get all node names.
     * 
     * @return array of town names.
     */
    public function getNodeNames()
    {
        return array_keys($this->nodes);
    }

    /**
     * Creates a node and edge if they
     * don't already exist.
     * 
     * @param string $name Node name.
     * @return Node Corresponding to name.
     */
    protected function _createNode($name)
    {
        if (!array_key_exists($name, $this->nodes)) {
            require_once 'Node.php';
            $this->nodes[$name] = new Node($name, $this);
            $this->edges[$name] = array();
        }

        return $this->nodes[$name];
    }

    /**
     * Get array of edges connected to a node.
     * 
     * @return array Edges as key, distance as value.
     */
    public function getConnectedEdgeList($name)
    {
        return $this->edges[$name];
    }

    /**
     * Add start and end nodes if they don't already exist
     * and create an edge between them.
     * 
     * @param string $startName Start
     * @param string $endName Destination
     * @param int $distance From start to end node
     */
    public function addEdge($startName, $endName, $distance)
    {
        $this->_createNode($startName);
        $this->_createNode($endName);

        $connectionsToStart = $this->getConnectedEdgeList($startName);
        $this->edges[$startName][$endName] = $distance;
    }
}
?>
