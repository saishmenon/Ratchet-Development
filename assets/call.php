<?php 
$nodeList = array(); //what we want
$tree     = array(); //temp holder

        $db="localhost";                                                                                // database host name
        $dbUsername="ratchetresu";                                                                        // database username
        $dbPassword="N@rc0lepsea";                                                                        // database password
        $dbLink=mysql_connect($db,$dbUsername,$dbPassword);             // database link for connection to database

        // select which database you want to use for the game
        mysql_select_db('ratchet_research');




	
	$query = mysql_query("SELECT node_id, title, parent FROM ratchet_node ORDER BY parent");
	while($row = mysql_fetch_assoc($query)){
		$nodeList[$row['node_id']] = array_merge($row);
		//var_dump($nodeList);
	}

    foreach ($nodeList as $nodeId => &$node) {
        if (!$node['parent'] || !array_key_exists($node['parent'], $nodeList)) {
            $tree[] = &$node;
            //var_dump($tree);
        /*}else if(!$node['parent'] || !array_key_exists($node['parent'], $nodeList)){
            $nodeList[$node['parent']]['children'][] = &$node;*/
        }else {
            $nodeList[$node['parent']]['children'][] = &$node;
        }
    }
   // echo '<hr/>';
   //var_dump($nodeList);
  
    $json = json_encode([$nodeList[$_GET['startNode']]]);
    // echo '<hr/>';
    //echo $json;
    echo $json;

$myfile = fopen("../treeData.json", "w") or die("Unable to open file!");
//    $txt = json_encode($json);
    fwrite($myfile, $json);
    fclose($myfile);
    
?>