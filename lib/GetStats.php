<?php

	// Include the HTML Parser library file 
	include_once 'simple_html_dom.php';
	
	// Define constants for this script
	$root = 'http://schl.org';
	
	$url = 'http://schl.org/team.php?team_id=56348&area=stats';
	
	// ################### BEGIN SCRIPT ########################
	
	// Grab the html page from the specified URL
	$html = file_get_html($url);
	
	// Initialize the output array
	$results = array();
	
	// Iterate over all the players in the table parsed from the HTML page
	foreach($html->find('table#s_table > tbody#s_body > tr > td.name > a') as $elem)
	{
		$nUrl = $root . "/" . $elem->href;
		
		// Grab the player profile HTML page
		$nHtml = file_get_html($nUrl);
		
		// Create a player associative array and begin storing data in it
		
		// Get player's number
		$player["number"] = $elem->parent()->parent()->first_child()->innertext;
		
		// Get player's name
		$name = $elem->innertext;
		
		$name_s = explode(",", $name);
		
		// Parse the first and last name from the string
		$player["fname"] = trim($name_s[1]);
		$player["lname"] = trim($name_s[0]);
		
		// This is in a foreach loop only because I didn't know how to just pull the first element from the result
		foreach($nHtml->find("table.bodytext > tbody > tr > td > img.bordered") as $nElem)
		{
			// Grab the URL to the player's profile image
			$player["image"] = $root . stripslashes($nElem->src);
			break;
		}
		
		// Parse player's personal info
		$i = 0;
		foreach($nHtml->find("table.bodytext > tbody > tr.alternate1 > td.text") as $nElem)
		{
			$innertext = str_replace("<br>", "~", $nElem->innertext);
			$innertext = str_replace("<b>", "~", $innertext);
			$innertext = str_replace("</b>", "~", $innertext);
			$innertext = str_replace("\"", "\\\"", $innertext);
			$arr = explode("~", $innertext);
			
			// indicates we are parsing the first column of information
			if($i == 0)
			{
				$player["height"] = trim($arr[2]);
				$player["weight"] = trim($arr[5]);
				$player["position"] = trim($arr[8]);
				$player["shoots"] = trim($arr[11]);
			}
			// indicates we are parsing the second column of information
			else if($i == 1)
			{
				$player["hometown"] = trim($arr[2]);
				$player["age"] = trim($arr[5]);
				$player["year"] = trim($arr[8]);
				$player["major"] = trim($arr[11]);
			}
			$i++;
		}
		
		// Add player's information to the output array
		array_push($results, $player);
	}
	
	// Set the response header
	header("Content-type: application/json", true, 200);
	
	// output a JSON encoded version of the output array
	echo stripslashes(json_encode($results));
?>
