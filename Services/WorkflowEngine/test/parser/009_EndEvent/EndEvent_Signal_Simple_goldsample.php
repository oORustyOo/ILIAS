<?php
require_once './Services/WorkflowEngine/classes/workflows/class.ilBaseWorkflow.php';
require_once './Services/WorkflowEngine/classes/nodes/class.ilBasicNode.php';
require_once './Services/WorkflowEngine/classes/activities/class.ilEventRaisingActivity.php';
require_once './Services/WorkflowEngine/classes/emitters/class.ilActivationEmitter.php';
require_once './Services/WorkflowEngine/classes/detectors/class.ilSimpleDetector.php';

		class EndEvent_Signal_Simple extends ilBaseWorkflow
		{
		
			public static $startEventRequired = false;
		
			public function __construct()
			{
		
			$_v_StartEvent_1 = new ilBasicNode($this);
			$this->addNode($_v_StartEvent_1);
		
			$this->setStartNode($_v_StartEvent_1);
			
			$_v_EndEvent_1 = new ilBasicNode($this);
			$this->addNode($_v_EndEvent_1);
		
				$_v_EndEvent_1_throwEventActivity = new ilEventRaisingActivity($_v_EndEvent_1);
				$_v_EndEvent_1_throwEventActivity->setEventType("Course");
				$_v_EndEvent_1_throwEventActivity->setEventName("UserLeft");
				$_v_EndEvent_1->addActivity($_v_EndEvent_1_throwEventActivity);
			
			$_v_EndEvent_1_detector = new ilSimpleDetector($_v_EndEvent_1);
			$_v_EndEvent_1->addDetector($_v_EndEvent_1_detector);
			$_v_StartEvent_1_emitter = new ilActivationEmitter($_v_StartEvent_1);
			$_v_StartEvent_1_emitter->setTargetDetector($_v_EndEvent_1_detector);
			$_v_StartEvent_1->addEmitter($_v_StartEvent_1_emitter);
		
			}
		}
		
?>