<?php

/* Roxanne7BlogBundle:Blog:index.html.twig */
class __TwigTemplate_d0a0a54e29398feb53281a2e71c29c219801093986a692d00bdb2036e3c33b54 extends Twig_Template {
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
    <h1>Hello ";
		// line 9
		echo twig_escape_filter ( $this->env, (isset ( $context ["nom"] ) ? $context ["nom"] : $this->getContext ( $context, "nom" )), "html", null, true );
		echo " !</h1>

    <p>
      Le Hello World est un grand classique en programmation.
      Il signifie énormément, car cela veut dire que vous avez
      réussi à exécuter le programme pour accomplir une tâche simple :
      afficher ce hello world !
    </p>
  </body>
</html>";
	}
	public function getTemplateName() {
		return "Roxanne7BlogBundle:Blog:index.html.twig";
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
