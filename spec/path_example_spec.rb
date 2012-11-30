require 'spec_helper'
describe PathExample do
  describe "#min_distance" do
    it "returns the shortest distance between nodes in a graph" do
      # call function to build test graph
      @searcher = PathExample.new
      initial_node_name = "A"
      destination_node_name = "C"
      expected_distance = 10

      @searcher.min_distance(initial_node_name, destination_node_name).should eq expected_distance
    end
  end
end

describe Connection do
  describe "#min_distance" do
    
  end
end
