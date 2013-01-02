<?php
/**
 * Tests for GraphBuilder class.
 * Dependency:  Story TestCase extension for phpunit.
 */
class PahFindBehaviourTest extends PHPUnit_Extensions_Story_TestCase
{
    /**
     * Test scenerio of loading edges from file
     * and finding the shortest distance path between
     * nodes.
     * @param string $startNode Start node name
     * @param string $endNode End node name
     * @param int $distance Distance between nodes
     * @dataProvider expectedPaths
     */
    public function testShortestDistance($startNode, $endNode, $distance)
    {
        $this->given('A csv file of edges', 'edges.csv')
          ->and('An empty graph')
          ->when('Reading in edges from csv')
          ->and('Adding edges to a graph')
          ->and('Finding shortest path', $startNode, $endNode)
          ->then('Shortest distance should be', $distance);
    }

    /**
     * Data provider for ShortestDistance test.
     * @return array
     */
    public function expectedPaths()
    {
        require_once '../ShortestPath.php';
        return array(
          array('A', 'C', 6),
          array('A', 'E', 16),
          array('C', 'DNE', ShortestPath::MAX_DISTANCE),
          array('D', 'E', ShortestPath::MAX_DISTANCE)
        );
    }

    /**
     * Initialize data.
     */
    public function runGiven(&$world, $action, $arguments)
    {
        switch($action) {
            case 'A csv file of edges': {
                $world['edgeFile']  = $arguments[0];
            }
            break;
            case 'An empty graph': {
                require_once '../Graph.php';
                $world['graph']  = new Graph();
            }
            break;
 
            default: {
                return $this->notImplemented($action);
            }
        }
    }

    /**
     * Run action.
     */
    public function runWhen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'Reading in edges from csv': {
                require_once '../ReadCsvEdges.php';
                $csvReader = new ReadCsvEdges();
                $world['edges'] = $csvReader->readEdges($world['edgeFile']);
            }
            break;
            case 'Adding edges to a graph': {
                require_once '../GraphBuilder.php';
                $builder = new GraphBuilder($world['graph']);

                $world['graph'] = $builder->build($world['edges']);
            }
            break;
            case 'Finding shortest path': {
                require_once '../ShortestPath.php';
                $pathFinder = new ShortestPath($world['graph']);
                $world['distance'] = $pathFinder->getShortestDistance($arguments[0], $arguments[1]);
            }
            break;

            default: {
                return $this->notImplemented($action);
            }
        }
    }

    /**
     * Make assertion.
     */
    public function runThen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'Shortest distance should be': {
                $this->assertEquals($arguments[0], $world['distance']);
            }
            break;
 
            default: {
                return $this->notImplemented($action);
            }
        }
    }
}
