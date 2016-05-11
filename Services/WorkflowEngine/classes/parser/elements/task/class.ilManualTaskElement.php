<?php
/* Copyright (c) 1998-2014 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilManualTaskElement
 *
 * @author Maximilian Becker <mbecker@databay.de>
 * @version $Id$
 *
 * @ingroup Services/WorkflowEngine
 */
class ilManualTaskElement extends ilBaseElement
{
	public $element_varname;

	public function getPHP($element, ilWorkflowScaffold $class_object)
	{
		$code = "";
		$element_id = ilBPMN2ParserUtils::xsIDToPHPVarname($element['attributes']['id']);
		$this->element_varname = '$_v_'.$element_id;

		$event_definition = null;

		$class_object->registerRequire('./Services/WorkflowEngine/classes/nodes/class.ilBasicNode.php');
		$code .= '
			' . $this->element_varname . ' = new ilBasicNode($this);
			' . $this->element_varname . '->setName(\'' . $this->element_varname . '\');
			$this->addNode(' . $this->element_varname . ');
		';
		$code .= $this->handleDataAssociations($element, $class_object, $this->element_varname);
		return $code;
	}
} 