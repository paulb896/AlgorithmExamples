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
     * @param Graph Instance.
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

        $pathDistances[$startNodeName] = 0;
        $unreadTowns = $pathDistances;

        while(count($unreadTowns) > 0) {
            list ($lowestCostName, $dist) = $this->getLowestCost($unreadTowns);
            if ($dist == self::MAX_DISTANCE) {
                $unreadTowns = array();
                break;
            } else {
                $edges = $this->_graph->getConnectedEdgeList($lowestCostName);
                foreach($edges as $name => $distance) {
                    $newDistance = $pathDistances[$lowestCostName] + $distance;
                    if ($pathDistances[$name] > $newDistance
                        || ($pathDistances[$name] == 0)
                    ) {
                        $pathDistances[$name] = $newDistance;
                        $unreadTowns[$name] = $newDistance;
                    }
                }
                unset($unreadTowns[$lowestCostName]);
            }
        }
        return $pathDistances[$endNodeName];
    }

    private $_graph;    
}
?>
