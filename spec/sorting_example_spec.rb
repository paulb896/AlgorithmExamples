require 'spec_helper'
describe SortingExample do
  before :each do
    @input_array = Array(1..99)
    @sorted_input_array = @input_array
    @input_array.shuffle
    @sorter = SortingExample.new(@input_array)
  end
  describe "#bucket_sort" do
    it "returns the sorted array" do
      @sorter.bucket_sort.should eq (@sorted_input_array)
    end
  end
end
