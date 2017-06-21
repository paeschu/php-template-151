<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;

class IndexController 
{
  /**
   * @var paeschu\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param paeschu\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template)
  {
     $this->template = $template;
  }

  public function homepage() {
    echo "INDEX";
  }

  public function greet($name) {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }
  
}
