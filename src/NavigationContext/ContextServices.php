<?php namespace ILIAS\NavigationContext;

use ILIAS\GlobalScreen\Scope\Layout\Definition\LayoutDefinitionFactory;
use ILIAS\NavigationContext\Stack\CalledContexts;
use ILIAS\NavigationContext\Stack\ContextCollection;

/**
 * Class ContextServices
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class ContextServices
{

    /**
     * @var ContextRepository
     */
    private $context_repository;
    /**
     * @var ContextCollection
     */
    private $collection;


    /**
     * ContextServices constructor.
     *
     * @param LayoutDefinitionFactory $layout_definition_factory
     */
    public function __construct(LayoutDefinitionFactory $layout_definition_factory)
    {
        $this->context_repository = new ContextRepository($layout_definition_factory);
        $this->collection = new CalledContexts($this->context_repository);
    }


    /**
     * @return CalledContexts
     */
    public function stack() : CalledContexts
    {
        return $this->collection;
    }


    /**
     * @return ContextInterface
     */
    public function current() : ContextInterface
    {
        return $this->collection->current();
    }


    /**
     * @return CalledContexts
     */
    public function claim() : CalledContexts
    {
        return $this->collection;
    }


    /**
     * @return ContextCollection
     */
    public function collection()
    {
        return new ContextCollection($this->context_repository);
    }


    /**
     * @return ContextRepository
     */
    public function availableContexts() : ContextRepository
    {
        return $this->context_repository;
    }
}