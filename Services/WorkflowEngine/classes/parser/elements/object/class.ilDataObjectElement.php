<?php
/* Copyright (c) 1998-2014 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilDataObjectElement
 *
 * @author Maximilian Becker <mbecker@databay.de>
 * @version $Id$
 *
 * @ingroup Services/WorkflowEngine
 */
class ilDataObjectElement extends ilBaseElement
{
	public $element_varname;

	public function getPHP($element, ilWorkflowScaffold $class_object)
	{
		$name = $element['name'];
		$ext_name = ilBPMN2ParserUtils::extractDataNamingFromElement($element);

		$object_definition = ilBPMN2ParserUtils::extractILIASDataObjectDefinitionFromElement($element);
		if($object_definition != null)
		{
			$type = $object_definition['type'];
			$role = $object_definition['role'];
		} else {
			$type = 'mixed';
			$role = 'undefined';
		}

		if($ext_name != null)
		{
			$name = $ext_name;
		}
		$code = "";
		$code .= '
			$this->defineInstanceVar("'.$element['attributes']['id'].'","'.$name.'", false, "", "'.$type.'", "'.$role.'" );
		';

		return $code;
	}
} 