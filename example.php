<?

/*

Owen Borseth
Name.com LLC
owen@borseth.us

Example of how to use the PHP implementation of a ternary search tree.

*/

ini_set("memory_limit", "1G");
ini_set("max_execution_time", "0");

$searchWord = $argv[1];

require("./classes/TernaryNode.php");
require("./classes/TernaryTree.php");

//$wordArray = array("in");
$wordArray = array("in", "be", "of", "as", "by", "is", "or", "owen m borseth", "at", "he", "it", "on", "to");
//$wordArray = file("./data/english.sorted.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$wordArrayCount = count($wordArray);
echo("Loading $wordArrayCount strings...\n");

$myTernaryTree = new TernaryTree();

$counter = 0;
foreach($wordArray as $word)
{
    $myTernaryTree->insert($word);
    $counter++;

    if($counter % 1000 == 0)
	echo(time().": $counter / $wordArrayCount\n");
}

echo("Done loading.\n\n");

var_dump($myTernaryTree);

// broken
// $myTernaryTree->traverse();

echo("S: ".microtime_float()."\n");
$result = $myTernaryTree->search($searchWord, "i");
echo("E: ".microtime_float()."\n");
echo("iterative result: $result\n");

echo("S: ".microtime_float()."\n");
$result = $myTernaryTree->search($searchWord, "r");
echo("E: ".microtime_float()."\n");
echo("recursive result: $result\n");

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

?>
