<?php
/* Copyright (c) 1998-2014 ILIAS open source, Extended GPL, see docs/LICENSE */

/** @noinspection PhpIncludeInspection */
require_once './Services/WorkflowEngine/interfaces/ilEmitter.php';
/** @noinspection PhpIncludeInspection */
require_once './Services/WorkflowEngine/interfaces/ilDetector.php';
/** @noinspection PhpIncludeInspection */
require_once './Services/WorkflowEngine/interfaces/ilNode.php';
/** @noinspection PhpIncludeInspection */
require_once './Services/WorkflowEngine/interfaces/ilWorkflowEngineElement.php';

/**
 * ilDataEmitter is part of the petri net based workflow engine.
 * 
 * @author Maximilian Becker <mbecker@databay.de>
 * @version $Id$
 *
 * @ingroup Services/WorkflowEngine
 */
class ilDataEmitter implements ilEmitter, ilWorkflowEngineElement
{
	/**
	 * This holds a reference to the detector, which is to be triggered.
	 * 
	 * @var ilDetector 
	 */
	private $target_detector;

	/**
	 * This holds a reference to the parent ilNode.
	 * 
	 * @var ilNode 
	 */
	private $context;

	/** @var bool $emitted Holds information if the emitter emitted at least once. */
	private $emitted;

	/** @var string $name */
	protected $name;

	/** @var string $var_name */
	protected $var_name;

	/**
	 * Default constructor.
	 * 
	 * @param ilNode Reference to the parent node. 
	 */
	public function __construct(ilNode $a_context)
	{
		$this->context = $a_context;
		$this->emitted = false;
	}
	
	/**
	 * Sets the target detector for this emitter.
	 * 
	 * @param ilDetector $a_target_detector 
	 */
	public function setTargetDetector(ilDetector $a_target_detector)
	{
		$this->target_detector = $a_target_detector;
	}

	/**
	 * Gets the currently set target detector of this emitter.
	 * 
	 * @return ilDetector Reference to the target detector. 
	 */
	public function getTargetDetector()
	{
		return $this->target_detector;
	}
	
	/**
	 * Returns a reference to the parent node of this emitter.
	 * 
	 * @return ilNode Reference to the parent node.
	 */
	public function getContext()
	{
		return $this->context;
	}
	
	/**
	 * Executes this emitter after activating the target node. 
	 */
	public function emit()
	{
		foreach($this->getContext()->getRuntimeVars() as $key => $value)
		{
			if($key == $this->var_name)
			{
				$this->getContext()->getContext()->setInstanceVarByName($key, $value);
			}
		}

		if($this->target_detector instanceof ilDetector)
		{
			$this->target_detector->trigger(array());
		}
		$this->emitted = true;
	}
	
	public function getActivated()
	{
		return $this->emitted;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getVarName()
	{
		return $this->var_name;
	}

	/**
	 * @param string $var_name
	 */
	public function setVarName($var_name)
	{
		$this->var_name = $var_name;
	}

}