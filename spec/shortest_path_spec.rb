require 'spec_helper'
describe SortingExample do
  describe "#bucket_sort" do
    it "returns the a array" do
      @sorter.bucket_sort.should eq (@sorted_input_array)
    end
  end
end
    # Using count sort here with optimal bucket size
    # has potential for very fast sorting
