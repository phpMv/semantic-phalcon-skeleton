<?php

class IndexController extends ControllerBase{

	/**
	 * Default action
	 */
	public function indexAction(){
		$semantic = $this->jquery->semantic();

		$bt = $semantic->htmlButtonGroups("bts", ["One","Two","Three"]);
		$bt->getOnClick("index/ajax", "#ajaxResponse",["attr"=>"html"]);
		$header = $semantic->htmlHeader("header1", 1);
		$header->asTitle("Congratulations", "<div>You're now flying with Phalcon. Great things are about to happen with phpMv-UI!</div>");
		$header2=$semantic->htmlHeader("header2",3);
		$header2->asTitle("Semantic-UI test","<p>Click on one of these buttons :</p>");
		$this->jquery->compile($this->view);
	}

	/**
	 * Ajax action
	 * @param $id
	 */
	public function ajaxAction($value){
		$semantic = $this->jquery->semantic();
		$bt = $semantic->htmlButton("btReturn", "Return to index/index", "teal basic");
		$bt->onClick($this->jquery->doJQueryDeferred("#ajaxResponse", "html", "Return clicked"));
		$message = $semantic->htmlMessage("msg", "You clicked the button with value : <b>" . $value . "</b><br>", "info");
		echo $message->addContent($bt)->setIcon("info")->setDismissable();
		echo $this->jquery->compile($this->view);
		$this->view->disable();
	}
}

