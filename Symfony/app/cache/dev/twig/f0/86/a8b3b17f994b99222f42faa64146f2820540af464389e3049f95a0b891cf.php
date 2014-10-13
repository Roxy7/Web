<?php

/* Roxanne7BlogBundle:Blog:byebye.html.twig */
class __TwigTemplate_f086a8b3b17f994b99222f42faa64146f2820540af464389e3049f95a0b891cf extends Twig_Template {
	public function __construct(Twig_Environment $env) {
		parent::__construct ( $env );
		
		$this->parent = false;
		
		$this->blocks = array ();
	}
	protected function doDisplay(array $context, array $blocks = array()) {
		// line 2
		echo "
<!DOCTYPE html>
<html>
  <head>
    <title>Bienvenue sur ma première page avec le Site du Zéro !</title>
  </head>
  <body>
    <h1>ByeBye ";
		// line 9
		echo twig_escape_filter ( $this->env, (isset ( $context ["nom"] ) ? $context ["nom"] : $this->getContext ( $context, "nom" )), "html", null, true );
		echo " !</h1>


  </body>
</html>";
	}
	public function getTemplateName() {
		return "Roxanne7BlogBundle:Blog:byebye.html.twig";
	}
	public function isTraitable() {
		return false;
	}
	public function getDebugInfo() {
		return array (
				28 => 9,
				19 => 2 
		);
	}
}
