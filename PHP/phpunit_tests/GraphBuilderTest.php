<?php
/**
 * Tests for GraphBuilder class.
 */
class GraphBuilderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test graph building.
     */
    public function testBuildGraph()
    {
        require_once '../Graph.php';
        $mockGraph = $this->getMock('Graph', array(), array(), '', false, false);
        $mockGraph->expects($this->exactly(2))
             ->method('addEdge');

        $testEdges = array(
            array("A","B", 10),
            array("A","C", 3)
        );

        require_once '../GraphBuilder.php';
        $graphBuilder = new GraphBuilder($mockGraph);
        $graph = $graphBuilder->build($testEdges);
    }
}
?>
