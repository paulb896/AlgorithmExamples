require 'spec_helper'
describe SortingExample do
  before :each do
    # Leaves option to test with many different sorter setups
    @input_array_1 = Array(1..99)
    @sorter = SortingExample.new(@input_array_1.shuffle)

    @input_array_2 = Array(1..2)
    @sorter2 = SortingExample.new(@input_array_2.shuffle)
  end
  describe "#bucket_sort" do
    it "returns a sorted array" do
      @sorter.bucket_sort.should eq (@input_array_1)
      @sorter2.bucket_sort.should eq (@input_array_2)
    end
  end
end
