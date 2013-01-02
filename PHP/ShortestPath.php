<?php

/**
 * Class to find shortest path between two nodes in a graph.
 */
class ShortestPath
{
    const MAX_DISTANCE = 100000;

    /**
     * Set graph to search.
     * 
     * @param Graph $graph Instance of Graph class.
     * @return ShortestPah For easy chaining.
     */
    public function __construct($graph)
    {
        $this->_graph = $graph;
        
        return $this;
    }

    /**
     * Get information about lowest cost name
     * and distance in an array of nodes.
     * 
     * @param $connectedNodes array 
     * @return array(string, int)
     */
    public function getLowestCost($connectedNodes)
    {
        asort($connectedNodes);
        $nodeName = key($connectedNodes);
        $lowestCost = array_shift($connectedNodes);

        return array($nodeName, $lowestCost);
    }

    /**
     * Get shortest path distance between 2 nodes.
     * Uses implementation of dijkstra's algorithm.
     * 
     * @return int Path distance if one exists, maximum distance otherwise.
     */
    public function getShortestDistance($startNodeName, $endNodeName)
    {
        // Verify that start and end nodes exist in the graph.
        $graphNodeNames = $this->_graph->getNodeNames();
        if (array_search($startNodeName, $graphNodeNames) === false
            || array_search($endNodeName, $graphNodeNames) === false
        ) {
            return self::MAX_DISTANCE;
        }

        // Set all distances from starting node to all other nodes as a max distance
        $pathDistances = array_fill_keys(
            array_keys(
                array_flip(
                    $graphNodeNames
                )
            ),
            self::MAX_DISTANCE
        );

        // Initialize algorithm to use start node
        $pathDistances[$startNodeName] = 0;
        $unreadNodes = $pathDistances;

        while(count($unreadNodes) > 0) {
            list ($lowestCostName, $dist) = $this->getLowestCost($unreadNodes);
            if ($dist == self::MAX_DISTANCE) {
                $unreadNodes = array();
                break;
            } else {
                $edges = $this->_graph->getConnectedEdgeList($lowestCostName);
                foreach($edges as $connectedNodeName => $connectedNodeDistance) {
                    $newDistance = $pathDistances[$lowestCostName] + $connectedNodeDistance;
                    if ($pathDistances[$name] > $newDistance
                        || ($pathDistances[$name] == 0)
                    ) {
                        $pathDistances[$connectedNodeName] = $newDistance;
                        $unreadNodes[$connectedNodeName] = $newDistance;
                    }
                }
                unset($unreadNodes[$lowestCostName]);
            }
        }

        return $pathDistances[$endNodeName];
    }

    /**
     * Instance of graph class.
     * @var Graph
     */
    private $_graph;    
}
?>
