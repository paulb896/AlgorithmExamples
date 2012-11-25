class SortingExample
  def initialize(array_of_integers)
    @int_array = array_of_integers
    self
  end

  def bucket_sort
    bucket_arrays = []
    @int_array.each do |element|
      bucket_key = determine_bucket(element)
      if bucket_arrays[bucket_key].nil?
        bucket_arrays[bucket_key] = []
      end
      bucket_arrays[bucket_key].push(element)
    end

    # Using count sort here with optimal bucket size
    # has potential for very fast sorting
    bucket_arrays.map{|a| a.sort}.inject([], :concat)
  end

  def ideal_bucket_range
    10
  end

  private
  def determine_bucket(element)
    return (element / ideal_bucket_range).round
  end
end
