# Sorting and searching algorithms
## Shortest path with using PHP, PHPunit, and BDD

## Class Explaination:

**Class: Graph**                *Graph.php*

 - Contains information about a graph containing nodes and edges. Functionally allows edges to be created, and information about the current graph to be returned.

**Class: Node**                 *Node.php*

 - Contains information about a single node.

**Class: ShortestPath**         *ShortestPath.php*

 - Takes in a graph as input in the constructor. Contains functionality to find the shortest distance between nodes in graph.

**Class: ReadCsvEdges**         *ReadCsvEdges.php*

 - Converts csv edge data to array that can be used as input in graph builder class.

**Class: GraphBuilder**         *GraphBuilder.php*

 - Builds a graph from an array of edges, or adds new edges to an existing graph.

## Testing Explaination:

**Class: GraphBuilderTest**         *phpunit_tests/GraphBuilderTest.php*

 - Tests for graph building functionality using Mock Graph object.

**Class: PathFindBehaviourTest**     *phpunit_tests/PathFindBehaviourTest.php* 

 - Builds a graph using a csv file and the graph builder class. Tests ShortestPath class by asserting against expected path distances for graph.



 - To run behaviour test, you must have PHPUnit_Extensions_Story_TestCase extension added to phpunit.

Please see code for full function documentation.
