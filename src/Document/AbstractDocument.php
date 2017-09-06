<?php
/**
 *  Copyright 2017 Justin Dane D. Vallar
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *
 */

namespace Vallarj\JsonApi\Document;


use Vallarj\JsonApi\Schema\ResourceSchema;

abstract class AbstractDocument
{
    /** @var ResourceSchema[] Array of ResourceSchemas used by the document */
    private $resourceSchemas;

    /**
     * AbstractDocument constructor.
     */
    function __construct()
    {
        $this->resourceSchemas = [];
    }

    /**
     * Returns the ResourceSchema bindable with the given FQCN
     * @param string $class
     * @return null|ResourceSchema
     */
    public function getResourceSchema(string $class): ?ResourceSchema
    {
        if(isset($this->resourceSchemas[$class])) {
            return $this->resourceSchemas[$class];
        }

        return null;
    }

    /**
     * Adds a ResourceSchema to the list of ResourceSchemas that the document can use
     * @param ResourceSchema $resourceSchema
     */
    public function addResourceSchema(ResourceSchema $resourceSchema): void
    {
        $this->resourceSchemas[$resourceSchema->getClass()] = $resourceSchema;
    }
}