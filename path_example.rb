# Contains shortest path
# and depth first, breadth first search
# from a starting node.
class PathExample
  def min_distance(start_node, end_node)
    
    return 0
  end
end

class Connection
  def initialize(start_node, end_node, distance)
    @start_node = start_node
    @end_node = end_node
    @distance = distanceg
  end
end

class Graph
  def initialize
    @connections = Hash.new
  end
  def add_connection(connection)
    if (@connections.has_key?(connection.start_node.to_s))
      @connections[connection.start_node.to_s] = Hash.new
    end
    @connections[connection.start_node.to_s]
    
    end
  end
end
