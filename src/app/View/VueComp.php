<?php


namespace Webdev\Vuetest\app\View;

use Illuminate\View\Component;

class VueComp extends Component
{
	public $type;

	public $message;

	public function __construct(
		$type,
		$message
	)
	{
		$this->type = $type;
		$this->message = $message;
	}

	public function render()
	{
		return view('vuetest::vuecomp');
	}
}