<?php
/* Copyright (c) 1998-2014 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilAssociationElement
 *
 * @author Maximilian Becker <mbecker@databay.de>
 * @version $Id$
 *
 * @ingroup Services/WorkflowEngine
 */
class ilAssociationElement extends ilBaseElement
{
	public $element_varname;
	
	public function getPHP($element, ilWorkflowScaffold $class_object)
	{
		$code = "";
		$element_id = ilBPMN2ParserUtils::xsIDToPHPVarname($element['attributes']['id']);
		$this->element_varname = '$_v_'.$element_id;

		$event_definition = null;
		// TODO: Implement.
		$class_object->registerRequire('./Services/WorkflowEngine/classes/nodes/class.ilBasicNode.php');
		$code .= '
			// association_missing
		';
		return $code;
	}
} 