<?php

	// include
	include "library/RainTpl.php";

	// conf
	$config = array( 
					"base_url"	=> null, 
					"tpl_dir"	=> "templates/",
					"cache_dir"	=> "cache/",
					"debug"		=> true,
				   );

	//use Rain;
	RainTpl::configure( $config );

	global $global_variable;
	$global_variable = "I'm Global";

	// set variables
	$var = array(
					"variable"	=> "Hello",
					"version"	=> "3.0 Alpha",
					"menu"		=> array( 
											array("name" => "Home", "link" => "index.php", "selected" => true ),
											array("name" => "FAQ", "link" => "index.php/FAQ/", "selected" => null ),
											array("name" => "Documentation", "link" => "index.php/doc/", "selected" => null )
										),
					"week"		=> array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ),
					"title"		=> "Rain TPL 3 - Easy and Fast template engine", 
					"user"		=> array( 
											array("name" => "Fede", "color" => "blue" ),
											array("name" => "Sheska", "color" => "red" ),
											array("name" => "Who", "color" => "yellow" ),
										),
					"empty_array" => array(), 
					"copyright" => "Copyright 2006 - 2012 Rain TPL<br>Project By Rain Team",

				);
	
	$test = function( $params ){
		$value = $params[0];
		return "Translate: <b>$value</b>";
	};
	// add a function
	RainTpl::register_tag( "({@.*?@})", "{@(.*?)@}", $test );



	// draw
	$tpl = new RainTpl;
	$tpl->assign( $var );
	echo $tpl->draw( "page" );

        
?>