<?

/*

Owen Borseth
Name.com LLC
owen@borseth.us

Main class for PHP implementation of a ternary search tree.

*/

class TernaryTree
{
    private $tree;

    function insert(&$s)
    {
	$this->insertWord($this->tree, str_split($s));
    }

    function search(&$s, $t = "i")
    {
	if($t == "i")
	    return($this->searchWordIterative(str_split($s)));
	else
	    return($this->searchWordRecursive($this->tree, str_split($s)));
    }

    function traverse()
    {
	$this->traverseTree($this->tree);
    }

    function searchNear(&$s, $d)
    {
	$this->searchNearPrivate($this->tree, str_split($s), $d);
    }

    private function searchNearPrivate(&$p, &$s, $d)
    {
	// stub for future near string searches
    }

    private function traverseTree(&$p)
    {
	// broken

	if(!$p) return;

	$this->traverseTree($p->low);
	
	if($p->data)
	    $this->traverseTree($p->equal);
	else
	    echo($p->equal."\n");

	$this->traverseTree($p->high);
    }

    private function searchWordRecursive(&$p, &$s)
    {
	if(!$p) return(0);

	if(current($s) < $p->data)
	{
	    return($this->searchWordRecursive($p->low, $s));
	}
	elseif(current($s) > $p->data)
	{
	    return($this->searchWordRecursive($p->high, $s));
	}
	else
	{
	    if(current($s) == FALSE) return(1);
	    next($s);
	    return($this->searchWordRecursive($p->equal, $s));
	}
    }

    private function searchWordIterative(&$s)
    {
	$p = &$this->tree;

	while($p)
   	{
	    if(current($s) < $p->data)
	    {
		$p = &$p->low;
	    }
	    elseif(current($s) == $p->data)
	    {
		if(current($s) == FALSE) return(1);
		next($s);
		$p = &$p->equal;
	    }
	    else
	    {
		$p = &$p->high;
	    }
	}

	return(0);
    }

    private function insertWord(&$p, &$s)
    {
	if(!$p)
	{
	    $p = new TernaryNode();
	    $p->data = ((current($s)) ? current($s) : NULL);
	}

	if(current($s) < $p->data)
	{
	    $p->low = $this->insertWord($p->low, $s);
	}
	elseif(current($s) == $p->data)
	{
	    if(current($s))
	    {
		next($s);
		$p->equal = $this->insertWord($p->equal, $s);
	    }
	}
	else
	{
	    $p->high = $this->insertWord($p->high, $s);
	}

	return($p);
    }
}

?>
