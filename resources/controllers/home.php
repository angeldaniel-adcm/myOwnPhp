<?php namespace controllers;

	Use interfaces\controller as Controller;
	Use library\template as Template;

	/**
	* Home controller that run at Route /home
	*/
	class Home implements Controller
	{

		/**
		* template to render
		* @var array
		*/
		private $templateToRender = array();

		/**
		* Properties to be available on the view
		* @var array
		*/
		private $properties = array();
		
		/**
		* Trigger action requested
		* @var Method to run
		*/
		public function __construct($actionToRun = "default")
		{
			$this->templateToRender = $this->$actionToRun();

		} // __construct()

		/**
		* Home default action
		* @return template list to render
		*/
		private function defaultAction()
		{
			$templateList = array();
			array_push($templateList, "\\views\\home.php");
			return $templateList;

		} // defaultAction()

		/**
		* Render templates required 
		*/
		public function render()
		{
			$templateList = $this->templateToRender;
			$properties = $this->properties;
			return New Template($templateList, $properties);

		} // render()

	}

?>
