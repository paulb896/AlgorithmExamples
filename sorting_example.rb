class SortingExample
  def initialize(array_of_integers)
    @int_array = array_of_integers
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

    bucket_arrays.map{|a| a.sort}.inject([], :concat)
  end

  def determine_bucket(element)
    return (element / ideal_bucket_range).round
  end

  def ideal_bucket_range
    10
  end
end
