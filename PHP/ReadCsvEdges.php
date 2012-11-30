<?php
/**
 * 
 */
class ReadCsvEdges
{
    /**
     * Reads engire csv into array.
     * <pre>
     *  Edges =
     *   A,C,1
     *   B,D,2
     *   A,D,3
     *   D,B,7
     * </pre>
     */
    public function readEdges($inputFile = 'edges.csv')
    {
        try {
            $parsedEdges = array();
            if (($fp = fopen($inputFile, "r")) !== false) {
                while (($edge = fgetcsv($fp, 1000, ",")) !== false) {
                    $parsedEdges[] = $edge;
                }
                fclose($fp);
            }
        } catch (Exception $e) {
            // File read exception
        }

        return $parsedEdges;
    }
}
?>
