require 'spec_helper'
describe SortingExample do
  before :each do
    @input_array = Array(1..9)
    @sorter = SortingExample.new(@input_array.shuffle)
  end
  describe "#bucket_sort" do
    it "returns a sorted array" do
      @sorter = SortingExample.new(@input_array)
      @sorter.bucket_sort.should eq (@input_array)
    end
  end
end
