<?php

/**
 * Class to build a graph class from a set of edges.
 */
class GraphBuilder
{
    /**
     * Set class graph or use default graph.
     * 
     * @param Graph Instance.
     */
    public function __construct($graph = null)
    {
        if (!is_null($graph)) {
            $this->_graph = $graph;
        } else {
            require_once 'Graph.php';
            $this->_graph = new Graph();
        }
    }

    /**
     * Get a graph containing all parsed edges.
     * 
     * @param array Edges in format 0 => start, 1 => end, 2 => distance
     * @return Graph containing all parsed edges.
     */
    public function build($edges)
    {
        foreach ($edges as $edge) {
            $this->_graph->addEdge($edge[0], $edge[1], $edge[2]);
        }

        return $this->_graph;
    }

    protected $_graph;
}
?>
