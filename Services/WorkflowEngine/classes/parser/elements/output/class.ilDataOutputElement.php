<?php
/* Copyright (c) 1998-2014 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilDataOutputElement
 *
 * @author Maximilian Becker <mbecker@databay.de>
 * @version $Id$
 *
 * @ingroup Services/WorkflowEngine
 */
class ilDataOutputElement extends ilBaseElement
{
	public $element_varname;

	public function getPHP($element, ilWorkflowScaffold $class_object)
	{
		$name = $element['name'];
		$ext_name = ilBPMN2ParserUtils::extractDataNamingFromElement($element);
		if($ext_name != null)
		{
			$name = $ext_name;
		}
		$code = "";
		$code .= '
			$this->defineInstanceVar("'.$element['attributes']['id'].'","'.$name.'" );
		';

		return $code;
	}
} 